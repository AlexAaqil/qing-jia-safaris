<div class="custom_form py-4 max-w-5xl mx-auto">
    <div class="header">
        <h2>Edit Booking</h2>
    </div>

    <form wire:submit="updateBooking" enctype="multipart/form-data">
        <div class="form_details">
            <p>
                <span>Name</span>
                <span>{{ $booking->first_name }} {{ $booking->last_name }}</span>
            </p>

            <p>
                <span>Email</span>
                <span>{{ $booking->email }}</span>
            </p>

            <p>
                <span>Phone Number</span>
                <span>{{ $booking->phone_number }}</span>
            </p>

            <p>
                <span>Tour</span>
                <span>{{ $booking->tour->title }}</span>
            </p>

            <p>
                <span>No. of adults</span>
                <span>{{ $booking->number_of_adults }}</span>
            </p>

             <p>
                <span>No. of adults</span>
                <span>{{ $booking->number_of_children ?? 'N/A' }}</span>
            </p>

            <p>
                <span>Travel Date</span>
                <span>{{ $booking->date_of_travel->format('jS M Y') }}</span>
            </p>

            <p>
                <span>Booking Date</span>
                <span>{{ $booking->created_at->format('jS M Y') }}</span>
            </p>

            <p>
                <span>Additional Information</span>
                <span>{{ $booking->additional_information ?? 'N/A' }}</span>
            </p>

            <p>status, payment_status, total_amount, amount_paid, ip_address, user_agent</p>
        </div>

        <div class="inputs_group_3">
            <div class="inputs">
                <label for="status">Booking Status</label>
                <select wire:model="status" id="status">
                    <option value="">Select Booking Status</option>
                    @foreach(\App\Enums\BOOKING_STATUSES::labels() as $value => $label)
                        <option value="{{ $value }}" {{ $value === $booking->status ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <div class="inputs">
                <label for="date_of_travel">Travel Date</label>
                <input type="date" wire:model="date_of_travel" id="date_of_travel" value="{{ $booking->date_of_travel->format('Y-m-d') }}">
            </div>
        </div>

        <div class="inputs_group_3">
            <div class="inputs">
                <label for="total_amount">Total Amount</label>
                <input type="number" wire:model="total_amount" id="total_amount" value="{{ $booking->total_amount }}">
            </div>

            <div class="inputs">
                <label for="amount_paid">Amount Paid</label>
                <input type="number" wire:model="amount_paid" id="amount_paid" value="{{ $booking->amount_paid }}">
            </div>

            <div class="inputs">
                <label for="status">Payment Status</label>
                <select wire:model="status" id="status">
                    <option value="">Select Payment Status</option>
                    @foreach(\App\Enums\PAYMENT_STATUSES::labels() as $value => $label)
                        <option value="{{ $value }}" {{ $value === $booking->payment_status ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="inputs">
            <label for="comments">Comments</label>
            <textarea wire:model="comments" id="ckeditor" rows="4">{{ $booking->comments }}</textarea>
        </div>

        <div class="buttons_group">
            <button type="submit" wire:loading.attr="disabled" wire:target="updateBooking">
                <span wire:loading.remove wire:target="updateBooking">Update Booking</span>
                <span wire:loading wire:target="updateBooking">Saving Booking...</span>
            </button>
            <a href="{{ Route::has('tours-bookings.index') ? route('tours-bookings.index') : '#' }}" wire:navigate class="btn btn_danger">Cancel</a>
        </div>
    </form>
</div>

<x-slot name="scripts">
    <x-livewire-ckeditor />
</x-slot>
