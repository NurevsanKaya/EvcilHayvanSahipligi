<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $table = 'pets';

    protected $fillable = ['name', 'breed_id', 'age', 'gender', 'health_status_id', 'user_id'];

    public function breed()
    {
        return $this->belongsTo(Pet_breed::class);
    }

    public function healthStatus()
    {
        return $this->belongsTo(Healt_status::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function training_info()
    {
        return $this->hasOne(Training_Info::class);
    }
    public function ad()
    {
        return $this->hasOne(Ad::class);
    }

}
