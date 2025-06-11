<?php

namespace App\Models\Tours;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tour extends Model
{
    protected $fillable = [
        'uuid',
        'title',
        'slug',
        'is_featured',
        'is_published',
        'summary',
        'description',
        'duration_days',
        'duration_nights',
        'currency',
        'price',
        'price_ranges_to',
        'tour_category_id',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(TourCategory::class);
    }

    public function iteneraries(): HasMany
    {
        return $this->hasMany(TourItenerary::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(TourImage::class)->orderBy('sort_order');
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function getImageAttribute()
    {
        $image = $this->images->first();
        $default_path = asset('assets/images/default-image.jpg');
        $image_path = asset('storage/' . $image?->image);

        if ($image) {
            return $image_path;
        }

        return $default_path;
    }
}
