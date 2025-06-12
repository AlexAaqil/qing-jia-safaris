<?php

namespace App\Models\Tours;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class TourCategory extends Model
{
    protected $guarded = [];

    public function tours(): HasMany
    {
        return $this->hasMany(Tour::class);
    }

    public function getImageAttribute()
    {
        $image = $this->attributes['image'];
        $default_path = asset('assets/images/default-image.jpg');

        if ($image && Storage::disk('public')->exists("tour-categories/images/{$image}")) {
            return Storage::url("tour-categories/images/{$image}");
        }

        return $default_path;
    }
}
