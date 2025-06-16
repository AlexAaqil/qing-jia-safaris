<?php

namespace App\Livewire\Pages\General;

use Livewire\Component;
use App\Models\Tours\Tour;
use App\Models\Tours\Destination;

class Index extends Component
{
    public function render()
    {
        $destinations = Destination::orderBy('title')->take(4)->get();
        $tours = Tour::where('is_featured', true)->where('is_published', true)->orderBy('title')->take(3)->get();

        return view('livewire.pages.general.index', compact('destinations', 'tours'))->layout('layouts.guest');
    }
}
