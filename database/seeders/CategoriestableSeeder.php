<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('categories')->insert([
            'user_id' => 1,
            'name' => '収入',
        ]);
        
        /*DB::table('categories')->insert([
            'user_id' => 1,
            'name' => '娯楽',
        ]);
        DB::table('categories')->insert([
            'user_id' => 1,
            'name' => '仕事',
        ]);*/
    }
}
