<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            [
                "category" => "Спорт",
                "name" => "sport"
            ],
            [
                "category" => "Политика",
                "name" => "politics"
            ],
            [
                "category" => "Бизнес",
                "name" => "business"
            ]
        ];

        DB::table('categories')->insert($category);
    }
}
