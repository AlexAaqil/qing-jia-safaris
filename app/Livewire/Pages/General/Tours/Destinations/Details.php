<?php

namespace App\Livewire\Pages\General\Tours\Destinations;

use Livewire\Component;
use App\Models\Tours\Destination;

class Details extends Component
{
    public Destination $destination;

    public function mount(Destination $destination)
    {
        $this->destination = $destination;
    }

    public function render()
    {
        return view('livewire.pages.general.tours.destinations.details')->layout('layouts.guest');
    }
}
