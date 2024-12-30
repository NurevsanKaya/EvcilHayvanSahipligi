<?php

namespace App\Http\Controllers;
use App\Models\Contacts;
use App\Models\District;
use App\Models\Favorite_ad;
use App\Models\Healt_status;
use App\Models\Pet;
use App\Status;
use Illuminate\Http\Request;

use App\Models\Ad;
use App\Models\Address;
use App\Models\City;
use App\Models\Pet_Breed;
use App\Models\PetType;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\DB;


class AdController
{
    public function getAd()//ilan oluşturma sayfası için
    {
        $petTypes = PetType::all(); // pet_types tablosundaki tüm verileri al
        $cities = City::all();
        return view('Ad', compact('petTypes','cities'));
    }

    public function showAds()
    {
        // İlanları ve ilişkili pet
        $ads = Ad::with(['pet', 'pet.breed', 'pet.breed.type'])->paginate(6);//->get();
        $cities = City::all();
        $breeds = Pet_Breed::all();

        // İlanları Blade şablonuna gönder
        return view('index', compact('ads','cities','breeds'));
    }

    public function dogShow()
    {
        $cities = City::all();
        $breeds = Pet_Breed::all();
        $ads = Ad::whereHas('pet.breed.type', function ($query) {//wherehas ile ilgili modele gidiyoruz
            $query->where('id', 2); // type_id'nin 2 olduğu kayıtları al
        })
            ->with(['pet', 'pet.breed', 'pet.breed.type']) // İlişkileri önceden yükle
           // ->get();
            ->paginate(6);
        return view('index',compact('ads','cities','breeds'));
    }

public function catShow()
    {
        $cities = City::all();
        $breeds = Pet_Breed::all();
        $ads = Ad::whereHas('pet.breed.type', function ($query) {//wherehas ile ilgili modele gidiyoruz
            $query->where('id', 1); // type_id'nin 2 olduğu kayıtları al
        })
            ->with(['pet', 'pet.breed', 'pet.breed.type']) // İlişkileri önceden yükle
            //->get();
            ->paginate(6);
        return view('index',compact('ads','cities','breeds'));
    }

    public function filter(Request $request)
    {
        $cities = City::all();
        $breeds = Pet_Breed::all();
        $query = Ad::query();
        $query->with(['pet','address.district']);

        //$request->has('breed')
        //Bu kontrol, gelen HTTP isteğinde ($request) bir breed parametresinin var olup olmadığını kontrol eder.
        //$request->breed
        //Bu kontrol, breed parametresinin boş veya null olmadığını kontrol eder.
        if($request->has('breed') && $request->breed)
        {
            $query->whereHas('pet', function ($query) use ($request) {
                $query->where('breed_id', $request->breed); // pet tablosunda breed_id filtrelemesi
            });
        }

        if($request->has('age_group') && $request->age_group )
        {
            $query->whereHas('pet', function ($query) use ($request) {
                $query->where('age', $request->age_group); // pet tablosunda age filtrelemesi
            });
        }

        if($request->has('city') && $request->city )
        {
            $query->whereHas('address.district.city', function ($query) use ($request) {
                $query->where('id', $request->city); // city tablosunda id filtrelemesi
            });
        }

        $ads = $query->paginate(6);

        return view('index', compact('ads','cities','breeds'));

    }

    public function getMyAd()
    {
        $ads = Ad::where('user_id',Auth::id())
            ->with(['pet', 'pet.breed', 'pet.breed.type'])->paginate(6);

        return view('MyAds',compact('ads'));

    }

    public function getUpdateAd($id)
    {
        $petTypes = PetType::all(); // pet_types tablosundaki tüm verileri al
        $cities = City::all();
        $ads = Ad::with([
                'user',
                'pet',
                'pet.breed',
                'pet.breed.type',
                'pet.healthStatus',
                'address',
                'address.district',
                'address.district.city',
                'contact'])->find($id);

        return view ('AdUpdate',compact('petTypes','cities','ads'));
    }

    public function UpdateAd(Request $request, $id)
    {
        $ad = Ad::find($id);
        $pet = Pet::find($ad->pet_id);
        $breed = Pet_Breed::find($pet->breed_id);
        $type = PetType::find($breed->type_id);
        $health = Healt_status::find($pet->health_status_id);
        $address = Address::find($ad->address_id);
        $district = District::find($address->district_id);
        $city = City::find($district->city_id);
        $contact =Contacts::find($ad->contact_id);



        try {
            DB::beginTransaction();// veri tabanı işlemlerini yaparken bir yerde hata çıkarsa komple geri almamıza yarar
                        //form alanı boş veya null mu diye kontrol eder.
            if ($request->filled('name') && $pet->name !== $request->input('name')) {
                $pet->name = $request->input('name');
            }

            if ($request->filled('pet_breed_id') && $pet->breed_id !== $request->input('pet_breed_id')) {
                $pet->breed_id = $request->input('pet_breed_id');
            }

            if ($request->filled('title') && $ad->title !== $request->input('title')) {
                $ad->title = $request->input('title');
            }

            if ($request->filled('description') && $ad->description !== $request->input('description')) {
                $ad->description = $request->input('description');
            }

            if ($request->filled('age_group') && $pet->age !== $request->input('age_group')) {
                $pet->age = $request->input('age_group');
            }

            if ($request->filled('genderr') && $pet->gender !== $request->input('genderr')) {
                $pet->gender = $request->input('genderr');
            }

            if ($request->filled('vaccination') && $health->vaccination !== $request->input('vaccination')) {
                $health->vaccination = $request->input('vaccination');
            }

            if ($request->filled('internal_parasite') && $health->internal_parasite !== $request->input('internal_parasite')) {
                $health->internal_parasite = $request->input('internal_parasite');
            }

            if ($request->filled('external_parasite') && $health->external_parasite !== $request->input('external_parasite')) {
                $health->external_parasite = $request->input('external_parasite');
            }

            if ($request->filled('health_description') && $health->health_description !== $request->input('health_description')) {
                $health->health_description = $request->input('health_description');
            }

            if ($request->filled('district_id') && $address->district_id !== $request->input('district_id')) {
                $address->district_id = $request->input('district_id');
            }
            /* Address tablosundaki street verisi ile eşleşiyor.
            if ($request->filled('address') && $address->street !== $request->input('address')) {
                $address->street = $request->input('address');
            }*/

            if ($request->filled('postal_code') && $address->postal_code !== $request->input('postal_code')) {
                $address->postal_code = $request->input('postal_code');
            }

            if ($request->filled('phone_number') && $contact->phone_number !== $request->input('phone_number')) {
                $contact->phone_number = $request->input('phone_number');
            }

            if ($request->filled('email') && $contact->email !== $request->input('email')) {
                $contact->email = $request->input('email');
            }
            if($request->hasFile('images'))
            {
                $resim_url = [];
                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $image) {
                        $fileName = time() . '-' . $image->getClientOriginalName();
                        $image->move(public_path('Ad_images'), $fileName);
                        $resim_url[] = $fileName; // Resim adlarını diziye ekliyoruz
                    }
                }
                $resim_url_string = implode(',', $resim_url);

                $ad->image_url = $resim_url_string;
            }

            if($contact->isDirty())
            {
                $contact->save();
            }
            if($city->isDirty())
            {
                $city->save();
            }
            if($district->isDirty())
            {
                $district->save();
            }
            if($address->isDirty())
            {
                $address->save();
            }
            if($health->isDirty())
            {
                $health->save();
            }
            if($type->isDirty())
            {
                $type->save();
            }
            if($breed->isDirty())
            {
                $breed->save();
            }
            if($pet->isDirty())
            {
                $pet->save();
            }
            if($ad->isDirty())
            {
                $ad->save();
            }
            DB::commit();// yukarda yapılan işlemleri veri tabanına aktarıyor
            return redirect()->route('myAds')->with('success', 'Başarıyla güncellendi!');
        }
        catch (Exception $e)
        {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }

    }


    public function destroy($id)
    {
        // Favoriyi veri tabanından sil
        $ads = Ad::find($id);

        if (!$ads) {
            return redirect()->back()->with('error', 'İlan bulunamadı.');
        }

        $ads->delete();

        return redirect()->back()->with('success', 'İlan başarıyla kaldırıldı.');
    }



    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
           'pet_type_id' => 'required',
            'pet_breed_id' => 'required',
           'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'age_group' => 'required|string',
             'genderr' => 'required|string',
            'vaccination' => 'required|boolean',
             'internal_parasite' => 'required|boolean',
              'external_parasite' => 'required|boolean',
              'health_description' => 'nullable|string',
              'city_id' => 'required',
              'district_id' => 'required',
              'address' => 'required',
              'postal_code' => 'required',
              'images' => 'nullable|array',
              'images.*' => 'image|mimes:jpeg,png,jpg,gif',
            'phone_number'=>'required',//regex:/^\d{11}$/: Telefon numarasının yalnızca 11 rakamdan oluşmasını sağlar. (Sadece sayılar ve 11 haneli olmak şartıyla)
            'email'=>'required|email'
        ]);

        $contacts= new Contacts();
        $contacts->phone_number = $request->phone_number;
        $contacts->email = $request->email;
        $contacts->save();

        $address = new Address();
       $address->postal_code=$request->postal_code;
       $address->district_id=$request->district_id;
       $address->save();

       $health_status = new Healt_status();
       $health_status->vaccination = $request->vaccination;
       $health_status->internal_parasite = $request->internal_parasite;
       $health_status->external_parasite = $request->external_parasite;
       $health_status->health_description = $request->health_description;
       $health_status->save();

       $pet = new Pet();
       $pet->name = $request->name;
       $pet->breed_id =$request->pet_breed_id;
       $pet->age =$request->age_group;
       $pet->gender =$request->genderr;
       $pet->health_status_id =$health_status->id;
       $pet->user_id =Auth::id();
       $pet->save();

        $resim_url = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $fileName = time() . '-' . $image->getClientOriginalName();
                $image->move(public_path('Ad_images'), $fileName);
                $resim_url[] = $fileName; // Resim adlarını diziye ekliyoruz
            }
        }

        // Dizi halinde saklamak istemiyorsak, stringe dönüştürebilirik
        $resim_url_string = implode(',', $resim_url);

       $ad = new Ad();
       $ad->user_id=Auth::id();
       $ad->pet_id=$pet->id;
       $ad->title=$request->title;
       $ad->description=$request->description;
       $ad->status_id=Status::Published->value;
       $ad->address_id=$address->id;
       $ad->image_url=$resim_url_string;
       $ad->contact_id = $contacts->id;
        $ad->save();



        return redirect()->route('index')->with('success', 'Ad created successfully!');
    }
}
