<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatsappAccount extends Model
{
    protected $table = "whatsapp_accounts";
    protected $primaryKey = 'id';
    protected $fillable = ['user_id','phone_number','business_id','access_token','status'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
