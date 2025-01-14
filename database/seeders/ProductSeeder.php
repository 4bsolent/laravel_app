<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('products')->insert([
            'name' => 'MackBook Air M1',
            'description' => 'Esto es un MackBook Air M1',
            'price' => 1200
        ]);

        DB::table('products')->insert([
            'name' => 'Iphone 15 Pro Max',
            'description' => 'Esto es un Iphone 15 Pro Max',
            'price' => 1500
        ]);

        DB::table('products')->insert([
            'name' => 'Ipad',
            'description' => 'Esto es un Ipad',
            'price' => 650
        ]);
    }
}
