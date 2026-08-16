<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Brand;
use App\Models\CarListing;
use App\Models\City;

class homeController extends Controller
{
    public function index(): View
    {
        $brands = Brand::all();
        $cities = City::all();
        $featuredCars = CarListing::with([
            'brand',
            'city'
        ])
            ->where(
                'status',
                'approved'
            )
            ->latest()
            ->take(3)
            ->get();

        return view(
            'home',
            compact(
                'featuredCars',
                'brands',
                'cities'
            )
        );
    }

    public function seller(User $user): View
    {
        $carListings = $user

            ->carListings()

            ->where(
                'status',
                'approved'
            )

            ->get();

        return view(
            'seller',
            compact(
                'user',
                'carListings'
            )
        );
    }
}
