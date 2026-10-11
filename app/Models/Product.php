<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'photo',
        'description',
        'unit',
        'price',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    /**
     * Get image URL with fallback.
     */
    public function getImageUrlAttribute(): string
    {
        if ($this->photo) {
            if (file_exists(public_path('images/products/' . $this->photo))) {
                return asset('images/products/' . $this->photo);
            }
            if (file_exists(public_path('images/product/' . $this->photo))) {
                return asset('images/product/' . $this->photo);
            }
        }

        return asset('images/product-reagents.jpg');
    }

    /**
     * Formatted price accessor.
     */
    public function getFormattedPriceAttribute(): string
    {
        return 'Rp ' . number_format((float) $this->price, 0, ',', '.');
    }
}
