<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriestableSeeder extends Seeder
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
            'name' => '食費',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 1,
            'name' => '娯楽',
        ]);
    }
}
