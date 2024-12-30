<?php

namespace App\Http\Controllers;

use App\Models\Pet_Breed;
use Illuminate\Http\Request;

class BreedController extends Controller
{
    public function show($type)
    {
        // Kedi veya köpek türüne göre ırkları alıyoruz
        $breeds = Pet_Breed::whereHas('pet', function ($query) use ($type) {
            $query->where('name', $type);
        })->get();

        return view('index', compact('breeds', 'type'));
    }
    public function showDogBreeds()
    {
        // Köpek ırklarını al
        $dogBreeds = Pet_Breed::with('petType')->where('type_id', 1)->take(6)->get();  // type_id: 1 'Köpek' türünü temsil eder

        return view('index', compact('dogBreeds'));
    }

}

