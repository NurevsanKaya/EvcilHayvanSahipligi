<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static whereHas(string $string, \Closure $param)
 */
class Ad extends Model
{
    use HasFactory;
    protected $table = 'ads';

    protected $fillable = ['user_id', 'pet_id', 'title', 'description', 'status_id', 'address_id', 'image_url','contact_id'];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    public function favori_ad()
    {
        return $this->hasMany(Favorite_ad::class);
    }
    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contacts::class);
    }

}

