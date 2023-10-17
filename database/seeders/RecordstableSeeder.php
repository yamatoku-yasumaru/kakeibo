<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('records')->insert([
            'date' => '2023/10/01',
            'category_id' => 1 ,
            'amount' => 1000,
            'memo' => 'テストデータ1',
        ]);
        
        // DB::table('records')->insert([
        //     'date' => '2023/10/02',
        //     'category_id' => 1 ,
        //     'amount' => 2000,
        //     'memo' => 'テストデータ2',
        // ]);
        
        // DB::table('records')->insert([
        //     'date' => '2023/10/01',
        //     'category_id' => 2 ,
        //     'amount' => 3000,
        //     'memo' => 'テストデータ3',
        // ]);
        
        // DB::table('records')->insert([
        //     'date' => '2023/10/10',
        //     'category_id' => 3 ,
        //     'amount' => 4500,
        //     'memo' => 'テストデータ4',
        // ]);
    }
}