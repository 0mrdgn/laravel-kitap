<?php

namespace Database\Seeders;

use App\Kalemler;
use App\Kitaplar;
use App\Markalar;
use App\Models\User;
use App\Order;
use App\Slider;
use App\YayinEvi;
use App\Yazarlar;
use App\Kategoriler;
use Faker\Generator;
use Faker\Provider\Image;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = new Generator();

        //User::factory()->count(100)->create();

        // Add Category
        $rootCat = Kategoriler::create(['name' => 'Roman','selflink' => 'roman','parentID' => null]);
        for($i=0; $i<3 ; $i++){
            $cat1 = Kategoriler::create(['name' => 'Korku','selflink' => 'korku','parentID' => $rootCat->id]);
            for ($k=0; $k<3 ; $k++){
                $cat2 = Kategoriler::create(['name' => 'Kurgu','selflink' => 'kurgu','parentID' => $cat1->id]);
                for ($z=0; $z<3 ; $z++){
                    Kategoriler::create(['name' => 'Zombi','selflink' => 'zombi','parentID' => $cat2->id]);
                }
            }
        }

        $rootCat2 = Kategoriler::create(['name' => 'Eğitim','selflink' => 'egitim','parentID' => null]);
        for($i=0; $i<5 ; $i++) {
            Kategoriler::create(['name' => 'Dil', 'selflink' => 'egitim', 'parentID' => $rootCat2->id]);
        }

        $rootCat3 = Kategoriler::create(['name' => 'Klasikler', 'selflink' => 'klasikler', 'parentID' => null]);
        for($i=0; $i<5 ; $i++) {
            Kategoriler::create(['name' => 'Dünya Klasikleri', 'selflink' => 'dunya-klasik', 'parentID' => $rootCat3->id]);
        }
        // Add Yazar
        $yazarlar = Yazarlar::factory()->count(3)->create();

        // Add Yayın Evi
        $yayinevi = YayinEvi::factory()->count(3)->create();

        // Add Kitaplar
        for ($i = 0; $i < 100; $i++){
            Kitaplar::create([
                'name' => Str::random(10),
                'selflink' => Str::random(10),
                'yazarid' => $yazarlar->random()->id,
                'yayineviid' => $yayinevi->random()->id,
                'fiyat' => random_int(1000, 100000),
                'image' => $faker->image('public/images'),
                'aciklama' => $faker->text(),
                'kategoriid' => $rootCat->id,
            ]);
        }

        //Add Marka
  /*      $marka = Markalar::create(['name' => 'Faber Castell','selflink' => 'faber-castell','parentID' => null]);

        // Add Kalemler
        for ($i = 0; $i < 100; $i++) {
            Kalemler::create([
                'name' => Str::random(10),
                'selflink' => Str::random(10),
                'markaid' => $marka->random()->id,
                'fiyat' => random_int(1000, 100000),
                'image' => $faker->image('public/images'),
                'info' => $faker->text(),
            ]);
        }  */

        //Add Slider
        Slider::create([
            'image' => $faker->image('public/images'),
        ]);


        //Add Order
        $order = Order::factory()->count(3)->create();
    }
}
