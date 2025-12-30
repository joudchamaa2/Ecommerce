<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tags extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];
    function products(){
        return $this->belongsToMany(products::class);
    }
}
