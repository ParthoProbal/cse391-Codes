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
    public function index(): View
    {

        $carListings = CarListing::with(['brand', 'city'])
            ->where('status', 'approved')
            ->get();

        return view('car_listings.index', compact('carListings'));
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
}
