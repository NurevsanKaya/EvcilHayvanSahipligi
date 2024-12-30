<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite_ad extends Model

{
    protected $table = 'favorite_ads';

    protected $fillable = ['user_id', 'ad_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
}
