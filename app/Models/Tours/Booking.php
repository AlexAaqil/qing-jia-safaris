<?php

namespace App\Models\Tours;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Enums\BOOKING_STATUSES;

class Booking extends Model
{
    protected $guarded = [];

    protected $casts = [
        'date_of_travel' => 'date',
        'status' => BOOKING_STATUSES::class,
    ];

    public function tour(): BelongsTo
    {
        return $this->belongsTo(Tour::class);
    }
}
