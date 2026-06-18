<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfigData extends Model
{
    protected $primaryKey = 'id';
    protected $table = "config_data";
    protected $fillable = ['WHATSAPP_PHONE_NUMBER_ID','WHATSAPP_BUSINESS_ACCOUNT_ID','WHATSAPP_TOKEN'];
}
