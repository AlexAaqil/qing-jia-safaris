<?php

namespace App\Models\Tours;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TourItenerary extends Model
{
    protected $guarded = [];

    public function tour(): BelongsTo
    {
        return $this->belongsTo(Tour::class);
    }
}
