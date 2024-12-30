<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            'Adana' => 74, 'Adıyaman' => 75, 'Afyonkarahisar' => 76, 'Aksaray' => 77, 'Amasya' => 78, 'Ankara' => 79,
            'Antalya' => 80, 'Ardahan' => 81, 'Artvin' => 82, 'Aydın' => 83, 'Balıkesir' => 84, 'Bartın' => 85,
            'Batman' => 86, 'Bayburt' => 87, 'Bilecik' => 88, 'Bingöl' => 89, 'Bitlis' => 90, 'Bolu' => 91, 'Burdur' => 92,
            'Bursa' => 93, 'Çanakkale' => 94, 'Çankırı' => 95, 'Çorum' => 96, 'Denizli' => 97, 'Diyarbakır' => 98, 'Düzce' => 99,
            'Edirne' => 100, 'Elazığ' => 101, 'Erzincan' => 102, 'Erzurum' => 103, 'Eskişehir' => 104, 'Gaziantep' => 105,
            'Giresun' => 106, 'Gümüşhane' => 107, 'Hakkâri' => 108, 'Hatay' => 109, 'Iğdır' => 110, 'Isparta' => 111,
            'İstanbul' => 112, 'İzmir' => 113, 'Karabük' => 114, 'Karaman' => 115, 'Kars' => 116, 'Kastamonu' => 117,
            'Kayseri' => 118, 'Kırıkkale' => 119, 'Kırklareli' => 120, 'Kocaeli' => 121, 'Konya' => 122, 'Kütahya' => 123,
            'Malatya' => 124, 'Manisa' => 125, 'Mardin' => 126, 'Mersin' => 127, 'Muğla' => 128, 'Muş' => 129, 'Nevşehir' => 130,
            'Niğde' => 131, 'Ordu' => 132, 'Osmaniye' => 133, 'Rize' => 134, 'Sakarya' => 135, 'Samsun' => 136,
            'Şanlıurfa' => 137, 'Siirt' => 138, 'Sinop' => 139, 'Sivas' => 140, 'Tekirdağ' => 141, 'Tokat' => 142,
            'Trabzon' => 143, 'Tunceli' => 144, 'Uşak' => 145, 'Van' => 146, 'Yalova' => 147, 'Yozgat' => 148, 'Zonguldak' => 149,
            'Kahramanmaraş' => 150, 'Kütahya' => 151, 'Edirne' => 152, 'Aydın' => 153, 'Bolu' => 154
        ];

        $districts = [
            'Adana' => [
                'Seyhan', 'Yüreğir', 'Çukurova', 'Pozantı', 'Aladağ', 'Karaisalı', 'Ceyhan', 'İmamoğlu', 'Tufanbeyli'
            ],
            'Adıyaman' => [
                'Merkez', 'Kahta', 'Besni', 'Gölbaşı', 'Gerger', 'Samsat', 'Tut', 'Çelikhan', 'Yapraklı'
            ],
            'Afyonkarahisar' => [
                'Merkez', 'Sandıklı', 'Dinar', 'Çay', 'Emirdağ', 'İhsaniye', 'Şuhut', 'Sinanpaşa', 'Bolvadin'
            ],
            'Aksaray' => [
                'Merkez', 'Sarıyahşi', 'Kızılkaya', 'Güzelyurt', 'Ağaçören', 'Kızılkaya', 'Eskil'
            ],
            'Amasya' => [
                'Merkez', 'Suluova', 'Merzifon', 'Gümüşhacıköy', 'Taşova', 'Zile', 'Göynücek'
            ],
            'Ankara' => [
                'Çankaya', 'Keçiören', 'Mamak', 'Sincan', 'Altındağ', 'Yenimahalle', 'Etimesgut', 'Pursaklar', 'Gölbaşı'
            ],
            'Antalya' => [
                'Muradpaşa', 'Kepez', 'Konyaaltı', 'Alanya', 'Manavgat', 'Kemer', 'Kumluca', 'Serik', 'Döşemealtı'
            ],
            'Ardahan' => [
                'Merkez', 'Göle', 'Hanak', 'Posof', 'Çıldır'
            ],
            'Artvin' => [
                'Merkez', 'Borçka', 'Hopa', 'Arhavi', 'Şavşat', 'Muratlı', 'Yusufeli'
            ],
            'Aydın' => [
                'Merkez', 'Efeler', 'Nazilli', 'Söke', 'Didim', 'Bozdoğan', 'Kuyucak', 'Çine', 'Karacasu'
            ],
            'Çanakkale' => [
                'Merkez', 'Ayvacık', 'Bayramiç', 'Biga', 'Çan', 'Eceabat', 'Gelibolu', 'Lapseki', 'Yenice'
            ],
            'Balıkesir' => [
                'Merkez', 'Altıeylül', 'Karesi', 'Ayvalık', 'Bandırma', 'Edremit', 'Erdek', 'Gömeç', 'İvrindi', 'Kepsut', 'Marmara', 'Savaştepe', 'Sındırgı', 'Susurluk'
            ]

        ];
        foreach ($cities as $cityName => $cityId) {
            $cityDistricts = $districts[$cityName] ?? [];

            foreach ($cityDistricts as $districtName) {
                DB::table('districts')->insert([
                    'name' => $districtName,
                    'city_id' => $cityId
                ]);
            }
        }
    }
}
