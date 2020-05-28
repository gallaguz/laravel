<?php

use App\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('news')->insert($this->getData());
        factory(News::class, 10)->create();
    }

    public function getData(): array {

        $faker = Faker\Factory::create('ru_RU');

        $data = [];


        for($i = 0; $i <= 50; $i++) {
            $data[] = [
                'title' => $faker->realText(rand(20,50)),
                'text' => $faker->realText(rand(100,3000)),
                'isPrivate' => (bool)rand(0,1),
                ];
        }

        return $data;
    }
}
