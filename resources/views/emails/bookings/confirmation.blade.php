@component('mail::message')
# Booking Confirmation

Hello {{ $booking->first_name }},

Thank you for booking with us. Here are your booking details:

**Booking Code:** {{ $booking->booking_code }}
**Tour Name:** {{ $booking->tour->title }}
**Travel Date:** {{ $booking->date_of_travel ?? 'Not specified' }}
**Adults:** {{ $booking->number_of_adults }}
**Children:** {{ $booking->number_of_children }}

@if ($booking->additional_information)
**Additional Notes:**
{{ $booking->additional_information }}
@endif

@component('mail::button', ['url' => route('book-tour-success', $booking->uuid)])
View Your Booking
@endcomponent

Thanks,<br>
{{ config('app.name') }} Team
@endcomponent
