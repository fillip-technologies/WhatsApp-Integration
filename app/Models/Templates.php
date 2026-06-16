<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Templates extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'category',
        'language',
        'body',
        'status',
        'meta_template_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }
}
