<div class="Bookings">
    <div class="container">
        <h2 class="bookings text-2xl font-bold mb-4">Bookings</h2>
        <div class="bookings">
            @forelse($bookings as $booking)
                <div class="booking">
                    <p>{{ $booking->first_name }} {{ $booking->last_name }}</p>
                    <p>{{ $booking->email }}</p>
                    <p>{{ $booking->phone_number }}</p>
                    <p>{{ $booking->tour->title }}</p>
                    <p>Date {{ $booking->travel_date ?? 'N/A' }}</p>
                </div>
            @empty
                <p>No bookings yet.</p>
            @endforelse
        </div>
    </div>
</div>
