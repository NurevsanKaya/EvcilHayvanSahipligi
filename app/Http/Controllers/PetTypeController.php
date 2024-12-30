<?php

namespace App\Http\Controllers;
use App\Models\Pet_Breed;
use App\Models\PetType;
class PetTypeController
{
    public function getBreeds($petTypeId)
    {
        // Seçilen türün ırklarını al
        $breeds = Pet_Breed::where('type_id', $petTypeId)->get();

        // ırkları JSON formatında döndür
        return response()->json($breeds);
    }
}
