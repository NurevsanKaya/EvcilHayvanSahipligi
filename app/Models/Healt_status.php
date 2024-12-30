<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Healt_status extends Model
{
    use HasFactory;
    protected $table = 'health_statuses';


    protected $fillable = ['vaccination', 'internal_parasite', 'external_parasite', 'health_description'];

    public function pet()
    {
        return $this->hasOne(Pet::class);
    }
}
