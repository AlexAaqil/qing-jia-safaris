<?php

namespace App\Livewire\Pages\Tours\Bookings;

use App\Models\Tours\Booking;
use Livewire\Component;

class Index extends Component
{
    public string $search = '';
    public ?string $delete_booking_id = null;
    public bool $showSearchIndicator = false;

    public function confirmBookingDeletion($bookingId)
    {
        $this->delete_booking_id = $bookingId;
    }

    public function deleteBooking()
    {
        if ($this->delete_booking_id) {
            $booking = Booking::where('uuid', $this->delete_booking_id)->first();

            if ($booking) {
                $booking->delete();
                $this->dispatch('notify', type: 'success', message: 'Booking deleted successfully');
            } else {
                $this->dispatch('notify', type: 'error', message: 'Booking not found');
            }

            $this->delete_booking_id = null;
        }
    }

    public function performSearch()
    {
        $this->showSearchIndicator = true;
    }

    public function clearSearch()
    {
        $this->search = '';
        $this->showSearchIndicator = false;
    }

    public function getBookingsProperty()
    {
        if ($this->search === '') {
            return Booking::with('tour')->latest()->get();
        }

        $search = '%' . $this->search . '%';
        return Booking::with('tour')
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', $search)
                    ->orWhere('booking_code', 'like', $search)
                    ->orWhere('email', 'like', $search)
                    ->orWhere('phone_number', 'like', $search)
                    ->orWhereHas('tour', fn($q) => $q->where('title', 'like', $search));
            })
            ->latest()
            ->get();
    }

    public function render()
    {
        $this->showSearchIndicator = false;
        return view('livewire.pages.tours.bookings.index', [
            'bookings' => $this->bookings,
            'count_bookings' => $this->bookings->count(),
        ]);
    }
}
