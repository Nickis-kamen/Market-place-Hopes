<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    public function shop(){
        return $this->belongsTo(Shop::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Categorie::class);
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
