<?php

namespace App\Models;

use Illuminate\Contracts\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    /** @use HasFactory<\Database\Factories\CategorieFactory> */
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function scopeFilter(Builder | QueryBuilder $query)
    {
        return $query->when(request('search') ?? null, function($query)
        {
            $query->where('title', 'like','%'.request('search').'%')
                ->orWhere('description', 'like', '%'.request('search'). '%');
        });

    }

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
