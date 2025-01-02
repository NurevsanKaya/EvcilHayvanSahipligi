<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Support\Facades\DB;

class AdShowController
{
    public function show($id)
    {
        // İlanı ID'ye göre bul
        //$adshow = Ad::with(['pet.breed.type', 'address.district.city'])
        $adshow=Ad::with([
            'contact',
            'user',
            'pet',
            'pet.breed',
            'pet.breed.type',
            'pet.healthStatus',
            'address',
            'address.district',
            'address.district.city',
        ])->findOrFail($id);






        return view('AdShow', compact('adshow' ));
    }
}
