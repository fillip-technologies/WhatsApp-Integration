<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
     protected  $table = "plans";
     protected $primaryKey =  "id";
     protected $fillable = ['name','price','description','plans','message_limit','validity_day','feature'];

     public function subscription(){
        return $this->hasMany(Subscription::class);
     }

     protected $casts = ['feature'=>'array'];
    }
