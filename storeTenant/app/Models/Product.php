<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\BelongsTenantScope;

class Product extends Model
{
    use HasFactory, BelongsTenantScope;

    public function setNameAttribute($prop)
    {
        $this->attributes['name'] = $prop;
        $this->attributes['slug'] = \Illuminate\Support\Str::slug($prop);
    }

    public function setPriceAttribute($prop)
    {
        $price = str_replace(['.', ','], ['', '.'], $prop);
        $this->attributes['price'] = $price * 100;
        
    }
    public function getPriceAttribute()
    {
       
        return $this->attributes['price'] / 100;
    }

    protected $fillable = [
        'name',
        'description',
        'body',
        'price',
        'slug'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
