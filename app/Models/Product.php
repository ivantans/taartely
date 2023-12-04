<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ["id"];

    // protected $with = ["category", "user"];


    public function category(){
        return $this->belongsTo(Category::class, "category_id");
    }

    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }

    public function carts(){
        return $this->hasMany(Cart::class);
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }
    public function getRouteKeyName(){
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
