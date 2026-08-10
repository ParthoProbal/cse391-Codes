<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\View\View;

class cityController extends Controller
{
    //
    public function index(): View
    {
        $cities = City::all();

        return view('cities.index', compact('cities'));
    }

    public function create(): View
    {
        return view('cities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:cities,name',
        ]);

        City::create([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('cities.index')
            ->with('success', 'City added successfully.');
    }

    public function edit(City $city): View
    {
        return view('cities.edit', compact('city'));
    }

    public function update(Request $request, City $city)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:cities,name,' . $city->id,
        ]);

        $city->update([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('cities.index')
            ->with('success', 'City updated successfully.');
    }

    public function destroy(City $city)
    {
        $city->delete();

        return redirect()
            ->route('cities.index')
            ->with('success', 'City deleted successfully.');
    }
}
