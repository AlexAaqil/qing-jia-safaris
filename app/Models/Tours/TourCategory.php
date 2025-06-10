<?php

namespace App\Models\Tours;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TourCategory extends Model
{
    protected $guarded = [];

    public function tours(): HasMany
    {
        return $this->hasMany(Tour::class);
    }
}
