<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class homeController extends Controller
{
    public function index(): View
    {
        $featuredCars = [
            [
                'name' => 'Toyota Corolla',
                'year' => 2020,
                'price' => '$18,500',
                'location' => 'Dhaka',
                'image' => 'https://images.unsplash.com/photo-1623869675781-80aa31012a5a?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'name' => 'Honda Civic',
                'year' => 2019,
                'price' => '$20,000',
                'location' => 'Chittagong',
                'image' => 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'name' => 'BMW 3 Series',
                'year' => 2021,
                'price' => '$35,500',
                'location' => 'Dhaka',
                'image' => 'https://images.unsplash.com/photo-1555215695-3004980ad54e?auto=format&fit=crop&w=800&q=80',
            ],
        ];

        return view('home', compact('featuredCars'));
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
