<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\CarListing;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\View\View;

class carListingController extends Controller
{
    //
    public function index(Request $request): View
    {
        $search = $request->search;

        $brandId = $request->brand_id;

        $cityId = $request->city_id;

        $brands = Brand::all();

        $cities = City::all();

        $carListings = CarListing::with([
            'brand',
            'city'
        ])

            ->where(
                'status',
                'approved'
            )

            ->when($search, function ($query) use ($search) {

                $query->where(function ($subQuery) use ($search) {

                    $subQuery->where(
                        'title',
                        'like',
                        "%{$search}%"
                    )

                        ->orWhere(
                            'model',
                            'like',
                            "%{$search}%"
                        );
                });
            })

            ->when($brandId, function ($query) use ($brandId) {

                $query->where(
                    'brand_id',
                    $brandId
                );
            })

            ->when($cityId, function ($query) use ($cityId) {

                $query->where(
                    'city_id',
                    $cityId
                );
            })

            ->get();

        return view(
            'car_listings.index',
            compact(
                'carListings',
                'search',
                'brandId',
                'cityId',
                'brands',
                'cities'
            )
        );
    }

    public function create(): View
    {
        $brands = Brand::all();
        $cities = City::all();

        return view('car_listings.create', compact('brands', 'cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'city_id' => 'required|exists:cities,id',
            'title' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'price' => 'required|numeric|min:0',
            'mileage' => 'required|integer|min:0',
            'fuel_type' => 'required|string|max:50',
            'transmission' => 'required|string|max:50',
            'description' => 'required|string',
        ]);

        CarListing::create([
            'user_id' => auth()->id(),
            'brand_id' => $request->brand_id,
            'city_id' => $request->city_id,
            'title' => $request->title,
            'model' => $request->model,
            'year' => $request->year,
            'price' => $request->price,
            'mileage' => $request->mileage,
            'fuel_type' => $request->fuel_type,
            'transmission' => $request->transmission,
            'description' => $request->description,
            'status' => 'pending',
            'is_featured' => false,
        ]);

        return redirect()
            ->route('car_listings.index')
            ->with('success', 'Car listing submitted successfully.');
    }

    public function show(CarListing $carListing): View
    {
        $carListing->load([
            'brand',
            'city',
            'user'
        ]);

        return view(
            'car_listings.show',
            compact('carListing')
        );
    }

    public function myListings(): View
    {
        $carListings = auth()->user()

            ->carListings()

            ->with([
                'brand',
                'city'
            ])

            ->latest()

            ->get();

        return view(
            'car_listings.my',
            compact('carListings')
        );
    }

    public function edit(CarListing $carListing): View
    {
        if ($carListing->user_id !== auth()->id()) {
            abort(403);
        }

        $brands = Brand::all();

        $cities = City::all();

        return view(
            'car_listings.edit',
            compact(
                'carListing',
                'brands',
                'cities'
            )
        );
    }

    public function update(
        Request $request,
        CarListing $carListing
    ) {
        if ($carListing->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([

            'brand_id' => 'required|exists:brands,id',

            'city_id' => 'required|exists:cities,id',

            'title' => 'required|string|max:255',

            'model' => 'required|string|max:255',

            'year' => 'required|integer|min:1900|max:' . date('Y'),

            'price' => 'required|numeric|min:0',

            'mileage' => 'required|integer|min:0',

            'fuel_type' => 'required|string|max:50',

            'transmission' => 'required|string|max:50',

            'description' => 'required|string',

        ]);

        $carListing->update([

            'brand_id' => $request->brand_id,

            'city_id' => $request->city_id,

            'title' => $request->title,

            'model' => $request->model,

            'year' => $request->year,

            'price' => $request->price,

            'mileage' => $request->mileage,

            'fuel_type' => $request->fuel_type,

            'transmission' => $request->transmission,

            'description' => $request->description,

            'status' => 'pending',

        ]);

        return redirect()

            ->route('car_listings.my')

            ->with(
                'success',
                'Car listing updated successfully.'
            );
    }

    public function destroy(
        CarListing $carListing
    ) {
        if ($carListing->user_id !== auth()->id()) {
            abort(403);
        }

        $carListing->delete();

        return redirect()

            ->route('car_listings.my')

            ->with(
                'success',
                'Car listing deleted successfully.'
            );
    }
}
