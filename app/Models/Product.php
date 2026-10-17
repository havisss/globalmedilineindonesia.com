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
        if (!empty($this->photo)) {
            // Full external URL
            if (str_starts_with($this->photo, 'http://') || str_starts_with($this->photo, 'https://')) {
                return $this->photo;
            }
            // Uploaded via Laravel storage (e.g. storage/products/... or products/...)
            $cleanPhoto = ltrim($this->photo, '/');
            if (file_exists(public_path('storage/' . $cleanPhoto))) {
                return asset('storage/' . $cleanPhoto);
            }
            if (str_starts_with($cleanPhoto, 'storage/') && file_exists(public_path($cleanPhoto))) {
                return asset($cleanPhoto);
            }
            // Direct path in public
            if (file_exists(public_path($cleanPhoto))) {
                return asset($cleanPhoto);
            }
            // Standard product image directories
            if (file_exists(public_path('images/products/' . $cleanPhoto))) {
                return asset('images/products/' . $cleanPhoto);
            }
            if (file_exists(public_path('images/product/' . $cleanPhoto))) {
                return asset('images/product/' . $cleanPhoto);
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
