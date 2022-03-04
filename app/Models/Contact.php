<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = []; //fields which are not mass assignable - none

    protected static function booted(){
        static::addGlobalScope(new \App\Scopes\OwnerScope());
    }

    function user(){
        return $this->belongsTo('\App\User', 'user_id', 'id');
    }
}
