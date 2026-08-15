<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                <!-- Total Users -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 transition-all hover:shadow-md">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Users</p>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-white dark:text-white">
                        {{ $totalUsers }}
                    </p>
                </div>

                <!-- Total Listings -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 transition-all hover:shadow-md">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Listings</p>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-white dark:text-white">
                        {{ $totalListings }}
                    </p>
                </div>

                <!-- Pending Listings -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 transition-all hover:shadow-md">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Pending Listings</p>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-white dark:text-amber-400">
                        {{ $pendingListings }}
                    </p>
                </div>

                <!-- Approved Listings -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 transition-all hover:shadow-md">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Approved Listings</p>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-white dark:text-emerald-400">
                        {{ $approvedListings }}
                    </p>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>