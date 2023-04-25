<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        "title",
        "slug",
        "description",
        "price",
        "old_price",
        "inStock",
        "category_id"];

    
    //change route search from id to slug
    public function getRouteKeyName(){
        return "id";
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function images()
    {
    return $this->hasMany(Photo::class);
    }

    public function carts(){
        return $this->hasMany(Cart::class);
    }

}
