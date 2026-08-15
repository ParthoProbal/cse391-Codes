<?php

namespace App\Http\Controllers;

use App\Models\CarListing;
use App\Models\User;
use Illuminate\View\View;

class adminController extends Controller
{
    public function dashboard(): View
    {
        $totalUsers = User::count();
        $totalListings = CarListing::count();
        $pendingListings = CarListing::where(
            'status',
            'pending'
        )->count();

        $approvedListings = CarListing::where(
            'status',
            'approved'
        )->count();

        return view(
            'admin.dashboard',
            compact(
                'totalUsers',
                'totalListings',
                'pendingListings',
                'approvedListings'

            )

        );
    }
}
