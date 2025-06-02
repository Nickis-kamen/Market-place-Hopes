<?php

namespace App\Models;

use Illuminate\Contracts\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    /** @use HasFactory<\Database\Factories\ShopFactory> */
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFilter(Builder | QueryBuilder $query)
    {
        return $query->when(request('search') ?? null, function($query)
        {
            $query->where('name', 'like','%'.request('search').'%')
                ->orWhere('description', 'like', '%'.request('search'). '%');
        });

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function ratings()
    {
        return $this->hasMany(RatingsShop::class);
    }
    public function averageRating()
    {
        return $this->ratings()->avg('rating');
    }
    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'description',
        'image'
    ];
}
