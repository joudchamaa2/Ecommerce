<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products_images extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'products_id',
        'image',
    ];
    function products(){
        return $this->belongsTo(products::class);
    }
}
