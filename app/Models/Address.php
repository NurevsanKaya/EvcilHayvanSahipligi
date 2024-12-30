<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';


    protected $fillable = ['street', 'postal_code', 'district_id'];

    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function ads()
    {
        return $this->hasMany(Ad::class);
    }
}

