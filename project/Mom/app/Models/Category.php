<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'status',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getImageUrlAttribute()
    {
        if (!empty($this->image)) {
            if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
                return $this->image;
            }
            if (file_exists(public_path($this->image))) {
                return asset($this->image);
            }
        }

        $slug = $this->slug ?? '';
        if (str_contains($slug, 'party') && file_exists(public_path('assets/images/partyware.jpeg'))) {
            return asset('assets/images/partyware.jpeg');
        }
        if (str_contains($slug, 'dress') && file_exists(public_path('assets/images/light_pink_frock.jpeg'))) {
            return asset('assets/images/light_pink_frock.jpeg');
        }
        if (str_contains($slug, 'gown') && file_exists(public_path('assets/images/black_partyware.jpeg'))) {
            return asset('assets/images/black_partyware.jpeg');
        }
        if (str_contains($slug, 'skirt') && file_exists(public_path('assets/images/skitus.jpeg'))) {
            return asset('assets/images/skitus.jpeg');
        }
        if ((str_contains($slug, 'coord') || str_contains($slug, 'co-ord')) && file_exists(public_path('assets/images/yellow_frock.jpeg'))) {
            return asset('assets/images/yellow_frock.jpeg');
        }
        if (str_contains($slug, 'summer') && file_exists(public_path('assets/images/pink_partyware.jpeg'))) {
            return asset('assets/images/pink_partyware.jpeg');
        }

        return asset('assets/images/partyware.jpeg');
    }
}
