<?php

use Illuminate\Database\Seeder;
use App\Campanha;

class CampanhasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Campanha::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 10; $i++) {
            Campanha::create([
                'nome' => $faker->sentence,
                'dataInicio' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'dataFim' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'valorComissao' => $faker->numberBetween($min = 500, $max = 2000),
                'gerente' => $faker->name,
            ]);
        }
    }
}
