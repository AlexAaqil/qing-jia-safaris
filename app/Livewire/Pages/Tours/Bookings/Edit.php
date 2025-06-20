<?php

namespace App\Livewire\Pages\Tours\Bookings;

use Livewire\Component;
use App\Models\Tours\Booking;

class Edit extends Component
{
    public $booking;

    public function mount($booking)
    {
        $this->booking = Booking::where('uuid', $booking)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.pages.tours.bookings.edit');
    }
}
