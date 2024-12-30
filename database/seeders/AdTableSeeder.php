<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        DB::table('health_statuses')->insert([
            [
                'vaccination'=> true ,
                'internal_parasite'=> false ,
                'external_parasite'=> true ,
                'health_description'=>'Sağlık durumu iyi',
                'created_at' => Carbon::now()
            ],
            [
                'vaccination'=> false ,
                'internal_parasite'=> false ,
                'external_parasite'=> true ,
                'health_description'=>'Sağlık durumu iyi',
                'created_at' => Carbon::now()

            ],
            [
                'vaccination'=> true ,
                'internal_parasite'=> true ,
                'external_parasite'=> true ,
                'health_description'=>'Sağlık durumu mükkemmel',
                'created_at' => Carbon::now()
            ],
        ]);

        DB::table('pets')->insert([
            [
                'name'=>'loki',
                'breed_id'=> 5 ,
                'age'=> '0 ay',
                'gender'=>'Erkek',
                'health_status_id'=>1,
                'user_id'=>1,
                'created_at' => Carbon::now()
            ],
            [
                'name'=>'Karabaş',
                'breed_id'=> 4 ,
                'age'=> '1 yaş',
                'gender'=>'Erkek',
                'health_status_id'=>2,
                'user_id'=>2,
                'created_at' => Carbon::now()
            ],
            [
                'name'=>'mırnav',
                'breed_id'=> 1 ,
                'age'=> '5 ay',
                'gender'=>'Dişi',
                'health_status_id'=>3,
                'user_id'=>1,
                'created_at' => Carbon::now()
            ],
        ]);
        DB::table('statuses')->insert([
            [
                'name'=>'Yayında',
                'created_at' => Carbon::now()
            ],
            [
                'name'=>'Beklemede',
                'created_at' => Carbon::now()
            ],
            [
                'name'=>'Süresi doldu',
                'created_at' => Carbon::now()
            ],
            [
                'name'=>'İptal edildi',
                'created_at' => Carbon::now()
            ],
            [
                'name'=>'Tamamlandı',
                'created_at' => Carbon::now()
            ]
        ]);

        DB::table('addresses')->insert([

            [
                'postal_code'=>'17020',
                'district_id'=>95,
            ],
            [
                'postal_code'=>'17030',
                'district_id'=>99,
            ],
            [
                'postal_code'=>'17000',
                'district_id'=>98,
            ],
            [
                'postal_code'=>'10200',
                'district_id'=>85,
            ]
        ]);


        DB::table('ads')->insert([
            [
                'user_id'=>1,
                'pet_id'=>1,
                'title'=>'başlık1',
                'description'=>'Detaylar burda yazıyor',
                'status_id'=>1,
                'address_id'=>1
            ],
            [
                'user_id'=>1,
                'pet_id'=>3,
                'title'=>'başlık1',
                'description'=>'Detaylar burda yazıyor',
                'status_id'=>5,
                'address_id'=>1
            ],
            [
                'user_id'=>2,
                'pet_id'=>2,
                'title'=>'başlık1',
                'description'=>'Detaylar burda yazıyor',
                'status_id'=>2,
                'address_id'=>1
            ],

        ]);

        DB::table('training_infos')->insert([

            [
            'pet_id'=>1,
            'training_type'=>'Eğitim yok'
            ],
            [
            'pet_id'=>2,
            'training_type'=>'İleri Düzey Eğitim'
            ],
            [
            'pet_id'=>3,
            'training_type'=>'Temel Eğitim'
            ]
        ]);

        DB::table('contact_information')->insert([
            [
                'ad_id' =>1,
                'phone_number'=>'05667896543',
                'email'=>'kaya@gmail.com'
            ],
            [
                'ad_id' =>2,
                'phone_number'=>'05778970954',
                'email'=>'canikli@gmail.com'
            ],
            [
                'ad_id' =>3,
                'phone_number'=>'05887896525',
                'email'=>'Balıkesir@gmail.com'
            ],

        ]);
        */

    }
}
