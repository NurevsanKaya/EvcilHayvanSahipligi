<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getdistrict($city_id)
    {
        $district = District::where('city_id',$city_id)->get();
        return response()->json($district);
    }
}
