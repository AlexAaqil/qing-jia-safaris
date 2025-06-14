<?php

namespace App\Http\Controllers\Tours;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tours\Tour;
use App\Models\Tours\TourCategory;
use App\Http\Requests\Tours\TourRequest;
use Illuminate\Support\Str;

class TourController extends Controller
{
    public function create()
    {
        $categories = TourCategory::all();

        return view('pages.tours.tours.create', compact('categories'));
    }

    public function store(TourRequest $request)
    {
        $validated_data = $request->validated();

        $tour = Tour::create($validated_data);

        if(!empty($validated_data['itineraries'])) {
            foreach($validated_data['itineraries'] as $itinerary) {
                $tour->itineraries()->create($itinerary);
            }
        }

        if($request->hasFile('images')) {
            foreach($request->file('images') as $image_file) {
                $file_name = Str::slug($tour->title) . '-' . now()->format('dmyHis') . '-' . Str::random(5). '.'. $image_file->getClientOriginalExtension();
                $image_file->storeAs('tours/images/', $file_name, 'public');

                $tour->images()->create([
                    'image' => $file_name
                ]);
            }
        }

        return redirect()->route('tours.index')->with('success', 'Tour created successfully.');
    }

    public function edit(Tour $tour)
    {
        $categories = TourCategory::all();

        $tour->load('itineraries', 'images');

        return view('pages.tours.tours.edit', compact('tour', 'categories'));
    }

    public function update(TourRequest $request, Tour $tour)
    {
        $validated_data = $request->validated();

        $tour->update($validated_data);

        $tour->itineraries()->delete();

        if(!empty($validated_data['itineraries'])) {
            foreach($validated_data['itineraries'] as $itinerary) {
                $tour->itineraries()->create($itinerary);
            }
        }

        if($request->hasFile('images')) {
            foreach($request->file('images') as $image_file) {
                $file_name = Str::slug($tour->title) . '-' . now()->format('dmyHis') . '-' . Str::random(5). '.'. $image_file->getClientOriginalExtension();
                $image_file->storeAs('tours/images/', $file_name, 'public');

                $tour->images()->create([
                    'image' => $file_name
                ]);
            }
        }

        return redirect()->route('tours.index')->with('success', 'Tour updated successfully.');
    }
}
