<?php

namespace App\Livewire\Pages\General;

use Livewire\Component;
use App\Models\Tours\Tour;

class Index extends Component
{
    public function render()
    {
        $tours = Tour::where('is_featured', true)->where('is_published', true)->orderBy('title')->take(3)->get();

        return view('livewire.pages.general.index', compact('tours'))->layout('layouts.guest');
    }
}
