<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    /** @use HasFactory<\Database\Factories\CategorieFactory> */
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product');
    }

    protected $fillable = [
        'title',
        'slug',
        'description'
    ];
}
