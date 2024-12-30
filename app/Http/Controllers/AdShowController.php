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


        // Pet'in türünü alıyoruz
        $petTypeId = $adshow->pet->breed->type_id;

        // Benzer ilanları almak için aynı pet türüne sahip ilanları sorguluyoruz
        /*
        $similarAds = Ad::whereHas('pet', function ($query) use ($adshow,$petTypeId) {
            $query->select(DB::raw(1))
                ->from('pets')
                ->join('pet_breeds', 'pets.breed_id', '=', 'pet_breeds.id')
                ->join('pet_types', 'pet_breeds.type_id', '=', 'pet_types.id') // Pet türünü almak için doğru ilişkiyi kullanıyoruz
                ->where('pets.id', '=', $adshow->pet_id) // İlanın pet_id'si ile eşleşen petleri sorguluyoruz
                ->where('pet_types.id', '=', $petTypeId); // İlanın pet türü ile eşleşen ilanları alıyoruz
        })
            ->where('id', '!=', $adshow->id) // Kendisi hariç
            ->limit(3) // 3 tane benzer ilan göster
            ->get();
*/

        return view('AdShow', compact('adshow' ));
    }
}
