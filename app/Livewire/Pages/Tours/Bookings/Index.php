<?php

namespace App\Livewire\Pages\Tours\Bookings;

use Livewire\Component;
use App\Models\Tours\Booking;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $bookings = Booking::with('tour')->latest()->paginate(20);
        return view('livewire.pages.tours.bookings.index', compact('bookings'));
    }
}
