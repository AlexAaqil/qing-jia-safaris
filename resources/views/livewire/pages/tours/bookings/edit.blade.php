<div class="BookingForm custom_form py-4 max-w-5xl mx-auto">
    <div class="header">
        <h2>Edit Booking</h2>
    </div>

    <form action="{{ route('bookings.update', $booking) }}" method="post">
        @csrf
        @method('PATCH')

        <div class="form_details">
            <p>
                <span>Name</span>
                <span>{{ $booking->name }}</span>
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
                <span>No. of children</span>
                <span>{{ $booking->number_of_children ?? 'N/A' }}</span>
            </p>

            <p>
                <span>Booking Date</span>
                <span>{{ $booking->created_at->format('jS M Y') }}</span>
            </p>

            <p>
                <span>Travel Date</span>
                <span>{{ $booking->date_of_travel->format('jS M Y') }}</span>
            </p>

            <p>
                <span>Additional Information</span>
                <span>{{ $booking->additional_information ?? 'N/A' }}</span>
            </p>

            @if(auth()->user()->isSuperAdmin())
                <p>
                    <span>IP Address</span>
                    <span>{{ $booking->ip_address }}</span>
                </p>

                <p>
                    <span>User Agent</span>
                    <span>{{ $booking->user_agent }}</span>
                </p>
            @endif
        </div>

        <div class="inputs_group_3">
            <div class="inputs">
                <label for="status">Booking Status</label>
                <select name="status" id="status">
                    <option value="">Select Booking Status</option>
                    @foreach(\App\Enums\BOOKING_STATUSES::labels() as $value => $label)
                        <option value="{{ $value }}" {{ $booking->status == $value ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
                <x-form-input-error field="status" />
            </div>

            <div class="inputs">
                <label for="date_of_travel">Travel Date</label>
                <input type="date" name="date_of_travel" id="date_of_travel"
                       value="{{ $booking->date_of_travel->format('Y-m-d') }}">
                <x-form-input-error field="date_of_travel" />
            </div>
        </div>

        <div class="inputs_group_3">
            <div class="inputs">
                <label for="total_amount">Total Amount ($)</label>
                <input type="number" name="total_amount" id="total_amount" min="0"
                       value="{{ $booking->total_amount }}">
                <x-form-input-error field="total_amount" />
            </div>

            <div class="inputs">
                <label for="amount_paid">Amount Paid ($)</label>
                <input type="number" name="amount_paid" id="amount_paid" min="0"
                       value="{{ $booking->amount_paid }}">
                <x-form-input-error field="amount_paid" />
            </div>

            <div class="inputs">
                <label for="payment_status">Payment Status</label>
                <select name="payment_status" id="payment_status">
                    <option value="">Select Payment Status</option>
                    @foreach(\App\Enums\PAYMENT_STATUSES::labels() as $value => $label)
                        <option value="{{ $value }}" {{ $booking->payment_status == $value ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
                <x-form-input-error field="payment_status" />
            </div>
        </div>

        <div class="inputs">
            <label for="comments">Comments</label>
            <textarea name="comments" id="editor_ckeditor" placeholder="Enter your comments" rows="4">
                {{ $booking->comments }}
            </textarea>
            <x-form-input-error field="comments" />
        </div>

        <div class="buttons_group">
            <button type="submit">Update Booking</button>
            <a href="{{ route('bookings.index') }}" class="btn btn_danger">Cancel</a>
        </div>
    </form>
</div>

<x-slot name="javascript">
    <x-ckeditor />
</x-slot>
