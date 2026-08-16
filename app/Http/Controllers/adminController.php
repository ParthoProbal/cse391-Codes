<?php

namespace App\Http\Controllers;

use App\Models\CarListing;
use App\Models\User;
use Illuminate\View\View;

class adminController extends Controller
{
    private function checkAdmin()
    {
        if (!auth()->check()) {
            abort(403);
        }
        if (!auth()->user()->is_admin) {
            abort(403);
        }
    }

    public function dashboard(): View
    {
        $this->checkAdmin();
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

    public function listings(): View
    {
        $this->checkAdmin();
        $carListings = CarListing::with([
            'user',
            'brand',
            'city'
        ])->latest()->get();

        return view(
            'admin.listings',
            compact('carListings')
        );
    }

    public function approveListing(
        CarListing $carListing
    ) {
        $this->checkAdmin();
        $carListing->update([
            'status' => 'approved'

        ]);

        return redirect()
            ->route('admin.listings');
    }

    public function rejectListing(
        CarListing $carListing
    ) {
        $this->checkAdmin();
        $carListing->update([
            'status' => 'rejected'
        ]);
        return redirect()
            ->route('admin.listings');
    }

    public function users(): View
    {
        $this->checkAdmin();
        $users = User::latest()
            ->get();
        return view(
            'admin.users',
            compact('users')
        );
    }

    public function toggleAdmin(
        User $user
    ) {
        $this->checkAdmin();
        $user->update([
            'is_admin' => !$user->is_admin
        ]);
        return redirect()
            ->route('admin.users');
    }
}
