<?php

namespace App\Http\Controllers\Tours;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tours\Booking;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function edit(Booking $booking)
    {
        return view('pages.tours.bookings.edit', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'status' => 'nullable|string',
            'payment_status' => 'nullable|string',
            'date_of_travel' => 'nullable|date',
            'total_amount' => 'nullable|numeric|min:0',
            'amount_paid' => 'nullable|numeric|min:0',
            'comments' => 'nullable|string',
        ]);

        $booking->update([
            'status' => $validated['status'] ?? $booking->status,
            'payment_status' => $validated['payment_status'] ?? $booking->payment_status,
            'date_of_travel' => isset($validated['date_of_travel'])
                ? Carbon::parse($validated['date_of_travel'])
                : $booking->date_of_travel,
            'total_amount' => $validated['total_amount'] ?? $booking->total_amount,
            'amount_paid' => $validated['amount_paid'] ?? $booking->amount_paid,
            'comments' => $validated['comments'] ?? $booking->comments,
        ]);

        return redirect()
            ->route('bookings.index')
            ->with('notify', [
                'message' => 'Booking updated successfully',
                'type' => 'success',
            ]);
    }
}
