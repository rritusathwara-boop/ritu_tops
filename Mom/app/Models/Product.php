<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'discount_price',
        'sku',
        'stock',
        'is_featured',
        'is_new_arrival',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function colors()
    {
        return $this->hasMany(ProductColor::class);
    }

    public function sizes()
    {
        return $this->hasMany(ProductSize::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get primary image URL or fallback
     */
    public function getImageUrlAttribute()
    {
        $primary = null;
        if ($this->relationLoaded('images')) {
            $primary = $this->images->firstWhere('is_primary', true) ?: $this->images->first();
        } else {
            $primary = $this->images()->where('is_primary', true)->first() ?: $this->images()->first();
        }

        if ($primary && !empty($primary->image_path)) {
            if (str_starts_with($primary->image_path, 'http://') || str_starts_with($primary->image_path, 'https://')) {
                return $primary->image_path;
            }
            if (file_exists(public_path($primary->image_path))) {
                return asset($primary->image_path);
            }
            // If path stored without storage/ prefix
            if (file_exists(public_path('storage/' . $primary->image_path))) {
                return asset('storage/' . $primary->image_path);
            }
            return asset($primary->image_path);
        }

        // Map product slug/name to available assets if possible
        $slug = $this->slug ?? '';
        if (str_contains($slug, 'black') && file_exists(public_path('assets/images/black_partyware.jpeg'))) {
            return asset('assets/images/black_partyware.jpeg');
        }
        if (str_contains($slug, 'yellow') && file_exists(public_path('assets/images/yellow_frock.jpeg'))) {
            return asset('assets/images/yellow_frock.jpeg');
        }
        if (str_contains($slug, 'pink') && file_exists(public_path('assets/images/pink_partyware.jpeg'))) {
            return asset('assets/images/pink_partyware.jpeg');
        }
        if (str_contains($slug, 'frock') && file_exists(public_path('assets/images/light_pink_frock.jpeg'))) {
            return asset('assets/images/light_pink_frock.jpeg');
        }
        if ((str_contains($slug, 'skirt') || str_contains($slug, 'skitus')) && file_exists(public_path('assets/images/skitus.jpeg'))) {
            return asset('assets/images/skitus.jpeg');
        }

        return asset('assets/images/partyware.jpeg');
    }
}
