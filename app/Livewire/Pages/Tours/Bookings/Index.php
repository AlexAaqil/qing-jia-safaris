<?php

namespace App\Livewire\Pages\Tours\Bookings;

use App\Models\Tours\Booking;
use Livewire\Component;

class Index extends Component
{
    public string $search = '';
    public ?string $delete_booking_id = null;

    public function confirmBookingDeletion(array $data): void
    {
        $this->delete_booking_id = $data['booking_id'] ?? null;
    }

    public function deleteBooking(): void
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

    public function render()
    {
        $bookings = Booking::with('tour')
            ->when($this->search, function ($query) {
                $search = '%' . $this->search . '%';
                return $query->where(function ($q) use ($search) {
                    $q->where('first_name', 'like', $search)
                      ->orWhere('last_name', 'like', $search)
                      ->orWhere('booking_code', 'like', $search)
                      ->orWhere('email', 'like', $search)
                      ->orWhere('phone_number', 'like', $search)
                      ->orWhereHas('tour', fn($q) => $q->where('title', 'like', $search));
                });
            })
            ->latest()
            ->get();

        return view('livewire.pages.tours.bookings.index', [
            'bookings' => $bookings,
            'count_bookings' => $bookings->count(),
        ]);
    }
}
