<?php

use Illuminate\Database\Seeder;
use App\Criativo;

class CriativosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Criativo::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 10; $i++) {
            Criativo::create([
                'campanha_id' => $faker->numberBetween($min = 1, $max = 10),
                'tipo' => $faker->randomElement($array = array ('texto', 'imagem', 'cupom')),
                'urlRedirect' => $faker->url,
                'urlImage' => $faker->imageUrl($width = 640, $height = 480),
                'codCupom' => $faker->ean13,
            ]);
        }
        
    }
}
