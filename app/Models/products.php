<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class products extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'info',
        'description',
        'price',
        'quantity',
        'image',
    ];
    function images(){
        return $this->hasMany(products_images::class);
    }
    function tags(){
        return $this->belongsToMany(tags::class);
    }
}
