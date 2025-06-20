<div class="Tours Bookings">
    <div class="container">
        <div class="app_header">
            <div class="info">
                <h2>Bookings</h2>
                <div class="stats">
                    <span>{{ $count_bookings }} {{ Str::plural('booking', $count_bookings) }}</span>
                </div>
            </div>

            <div class="search">
                <input type="text" x-model="input" placeholder="Search..." @keydown.enter="$wire.set('search', input)">
                <div wire:loading wire:target="search">Searching...</div>
            </div>

            <div class="button">

            </div>
        </div>

        <div class="bookings_list">
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th class="numbering">#</th>
                            <th>Booking Code</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Tour</th>
                            <th>Date of travel</th>
                            <th class="action">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($bookings as $booking)
                            <tr>
                                <td class="numbering">{{ $loop->iteration }}</td>
                                <td>{{ $booking->booking_code }}</td>
                                <td>{{ $booking->first_name }} {{ $booking->last_name }}</td>
                                <td>{{ $booking->email }}</td>
                                <td>{{ $booking->phone_number }}</td>
                                <td>{{ Str::words($booking->tour->title, 5) }}</td>
                                <td>{{ $booking->date_of_travel->format('j M Y') ?? 'N/A' }}</td>
                                <td class="actions">
                                    <div class="action">
                                        <a href="{{ Route::has('bookings.edit') ? route('bookings.edit', $booking->uuid) : '#' }}">
                                            <x-svgs.edit class="text-green-600" />
                                        </a>
                                    </div>
                                    <div class="action">
                                        <button x-data="" x-on:click.prevent="$wire.set('delete_booking_id', '{{ $booking->uuid }}'); $dispatch('open-modal', 'confirm-booking-deletion')">
                                            <x-svgs.trash class="text-red-600" />
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">No bookings found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <x-modal name="confirm-booking-deletion" :show="$delete_booking_id !== null" focusable>
        <div class="custom_form">
            <form wire:submit="deleteBooking" @submit="$dispatch('close-modal', 'confirm-booking-deletion')" class="p-6">
                <h2 class="text-lg font-semibold text-gray-900">
                    Confirm Deletion
                </h2>

                <p class="mt-2 mb-4 text-sm text-gray-600">
                    Are you sure you want to permanently delete this booking?
                </p>

                <div class="buttons_group">
                    <button type="submit" class="btn_danger">
                        Delete booking
                    </button>

                    <button type="button" class="mr-2" x-on:click="$dispatch('close-modal', 'confirm-booking-deletion')">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </x-modal>
</div>

