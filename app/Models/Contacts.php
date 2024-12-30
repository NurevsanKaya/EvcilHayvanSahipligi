<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;
    protected $table = 'contact';



    protected $fillable = [
        'phone_number',
        'email',
    ];


    public function ad()
    {
        return $this->hasMany(Ad::class);
    }
}
