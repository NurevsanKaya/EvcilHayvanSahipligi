<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  Training_Info extends Model
{
    use HasFactory;
    protected $table = 'training_infos';


    protected $fillable = ['pet_id', 'training_type', 'start_date', 'end_date', 'trainer_name', 'comments'];

    public function pets()
    {
        return $this->belongsTo(Pet::class);
    }
}
