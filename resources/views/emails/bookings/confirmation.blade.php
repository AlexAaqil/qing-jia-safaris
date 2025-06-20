@component('mail::message')
# Booking Confirmation

Hello {{ $booking->first_name }},

Thank you for booking with us. Here are your booking details:

<p><strong>Booking Code:</strong> {{ $booking->booking_code }}</p>
<p><strong>Tour Name:</strong> {{ $booking->tour->title }}</p>
<p><strong>Travel Date:</strong> {{ $booking->date_of_travel ?? 'Not specified' }}</p>
<p><strong>Adults:</strong> {{ $booking->number_of_adults }}</p>
<p><strong>Children:</strong> {{ $booking->number_of_children }}</p>

@if ($booking->additional_information)
    <p><strong>Additional Notes:</strong></p>
    <p>{{ $booking->additional_information }}</p>
@endif

@component('mail::button', ['url' => route('book-tour-success', $booking->uuid)])
View Your Booking
@endcomponent

Thanks,<br>
{{ config('app.name') }} Team
@endcomponent
