<?php

namespace App\Http\Controllers;

use App\Models\Favorite_ad;
use Illuminate\Http\Request;

class FavoriteAdController extends Controller
{
    public function store(Request $request)
    {
       $request->validate([
           'ad_id'=>'required|exists:ads,id'//ads tablosunda id varmı kontrol ediyoruz
       ]) ;
       $favorite = new Favorite_ad();//modelin ismi
        if(!auth()->check())
        {
            return response()->json(['success' => false, 'message' => 'Giriş Yapmalısınız!']);
        }
       $favorite->user_id = auth()->id();
       $favorite->ad_id = $request->ad_id;
       $exists = Favorite_ad::where('user_id',auth()->id())
                            ->where('ad_id',$request->ad_id)
                            ->exists();
       if($exists)
       {
           return response()->json(['success' => false, 'message' => 'Zaten favorilerinde!']);
       }
       else
       {
           $favorite->save();//tabloya veri ekleme komutunu çalıştırır
           return response()->json(['success' => true, 'message' => 'Favorilere eklendi!']);
       }


    }

    public function favStore()
    {

        $favorites = Favorite_ad::with(['ad','ad.pet', 'ad.pet.breed', 'ad.pet.breed.type'])
                                ->where('user_id',auth()->id())//id yi getiren metod//kolonun adı ,değer
                                ->get();

        return view('FavoriteAd',compact('favorites'));
    }
    public function destroy($id)
    {
        // Favoriyi veri tabanından sil
        $favorite = Favorite_ad::find($id);

        if (!$favorite) {
            return redirect()->back()->with('error', 'Favori bulunamadı.');
        }

        $favorite->delete();

        return redirect()->back()->with('success', 'Favori başarıyla kaldırıldı.');
    }

}
