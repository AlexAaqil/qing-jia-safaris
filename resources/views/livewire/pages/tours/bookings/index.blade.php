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
                <div class="search-container">
                    <input
                        type="text"
                        wire:model="search"
                        placeholder="Search by name, email, tour..."
                        wire:keydown.enter="performSearch"
                        wire:change="performSearch"
                        class="input-search"
                    >
                    @if($search)
                        <button wire:click="clearSearch" class="clear-search">
                            ✕
                        </button>
                    @endif
                </div>

                <!-- Search indicator -->
                @if($showSearchIndicator)
                    <div class="searching-indicator">
                        Searching...
                    </div>
                @endif
            </div>

            <div class="button"></div>
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
                            <th>Travel Date</th>
                            <th>Booking Date</th>
                            <th class="action">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($bookings as $booking)
                            <tr>
                                <td class="numbering">{{ $loop->iteration }}</td>
                                <td>{{ $booking->booking_code }}</td>
                                <td>{{ $booking->name }}</td>
                                <td>{{ $booking->email }}</td>
                                <td>{{ $booking->phone_number }}</td>
                                <td>{{ Str::words($booking->tour->title, 4) }}</td>
                                <td>{{ $booking->date_of_travel->format('j M Y') ?? 'N/A' }}</td>
                                <td>{{ $booking->created_at->diffForHumans() }}</td>
                                <td class="actions">
                                    <div class="action">
                                        <a href="{{ Route::has('bookings.edit') ? route('bookings.edit', $booking->uuid) : '#' }}" wire:navigate>
                                            <x-svgs.edit class="text-green-600" />
                                        </a>
                                    </div>
                                    @if(auth()->user()->isAdmin())
                                        <div class="action">
                                            <button x-data=""  x-on:click.prevent="$wire.set('delete_booking_id', '{{ $booking->uuid }}'); $dispatch('open-modal', 'confirm-booking-deletion')">
                                                <x-svgs.trash class="text-red-600" />
                                            </button>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-4">
                                    @if($search)
                                        No bookings found for "{{ $search }}"
                                        <button wire:click="clearSearch" class="text-blue-500 hover:underline ml-2">
                                            Show all
                                        </button>
                                    @else
                                        No bookings available
                                    @endif
                                </td>
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
