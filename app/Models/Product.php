<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function shop(){
        return $this->belongsTo(Shop::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Categorie::class, 'category_product');
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public function averageRating()
    {
        return $this->ratings()->avg('rating');
    }


    protected $fillable = [
        'shop_id',
        'title',
        'slug',
        'description',
        'price',
        'image',
        'quantity',
    ];
}
