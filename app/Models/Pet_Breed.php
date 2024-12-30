<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet_Breed extends Model
{
    use HasFactory;
    protected $table = 'pet_breeds';


    protected $fillable = ['name', 'type_id'];

    public function type()
    {
        return $this->belongsTo(PetType::class);
    }

    public function pets()
    {
        return $this->hasMany(Pet::class);
    }
}
