<?php

namespace App\Livewire\Pages\Tours\Bookings;

use Livewire\Component;
use App\Models\Tours\Tour;
use App\Models\Tours\Booking;
use Illuminate\Support\Str;

class Form extends Component
{
    public $tour;

    public $first_name, $last_name, $email, $phone_number, $date_of_travel, $additional_information;
    public $number_of_adults = 1;
    public $number_of_children;

    protected $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone_number' => 'required|string|max:20',
        'number_of_adults' => 'required|integer|min:1',
        'number_of_children' => 'nullable|integer|min:0',
        'date_of_travel' => 'nullable|date|after:today',
        'additional_information' => 'nullable|string|max:1000',
    ];

    public function mount($tour)
    {
        $this->tour = Tour::where('slug', $tour)->firstOrFail();
    }

    protected function generateBookingCode()
    {
        do {
            $date = now()->format('dmy');
            $random = strtoupper(Str::random(5));

            $code = "{$random}-{$date}";
        } while (Booking::where('booking_code', $code)->exists());

        return $code;
    }

    public function submit()
    {
        $this->validate();

        $booking = Booking::create([
            'booking_code' => $this->generateBookingCode(),
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'number_of_adults' => $this->number_of_adults,
            'number_of_children' => $this->number_of_children,
            'date_of_travel' => $this->date_of_travel,
            'additional_information' => $this->additional_information,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'tour_id' => $this->tour->id,
        ]);

        return redirect()->route('book-tour-success', $booking->uuid);
    }

    public function render()
    {
        return view('livewire.pages.tours.bookings.form')->layout('layouts.guest');
    }
}
