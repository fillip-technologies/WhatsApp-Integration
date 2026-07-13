<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
     protected  $table = "plans";
     protected $primaryKey =  "id";
     protected $fillable = ['plan_type','name','price','description','plans','message_limit','validity_day','feature','button'];

     public function subscription(){
        return $this->hasMany(Subscription::class);
     }

     public function payment(){
        return $this->hasMany(Payment::class);
     }

     protected $casts = ['feature'=>'array'];
    }
