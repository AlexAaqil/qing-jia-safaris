<?php

namespace App\Models\Tours;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Enums\BOOKING_STATUSES;
use App\Enums\PAYMENT_METHODS;
use App\Enums\PAYMENT_STATUSES;
use Illuminate\Support\Str;

class Booking extends Model
{
    protected $guarded = [];

    protected $casts = [
        'date_of_travel' => 'date',
        'status' => BOOKING_STATUSES::class,
        'payment_status' => PAYMENT_STATUSES::class,
        'payment_method' => PAYMENT_METHODS::class,
    ];

    protected static function booted()
    {
        static::creating(function ($booking) {
            $booking->uuid = (string) Str::uuid();
        });
    }

    public function tour(): BelongsTo
    {
        return $this->belongsTo(Tour::class);
    }
}
