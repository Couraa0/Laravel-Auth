<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Izinkan kolom-kolom ini diisi data
    protected $fillable = [
        'category_id', // Wajib ada agar produk tahu dia masuk kategori mana
        'image',
        'title',
        'description',
        'price',
        'stock',
    ];

    // Relasi: 1 Produk hanya dimiliki oleh 1 Kategori (Belongs To)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($image) => url('/storage/products/' . $image),
        );
    }
}
