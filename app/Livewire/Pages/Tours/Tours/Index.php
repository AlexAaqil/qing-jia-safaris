<?php

namespace App\Livewire\Pages\Tours\Tours;

use App\Models\Tours\Tour;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $tours = Tour::orderBy('title')->get();
        $count_tours = Tour::count();
        $count_published = Tour::where('is_published', true)->count();

        return view('livewire.pages.tours.tours.index', compact('tours', 'count_tours', 'count_published'));
    }
}
