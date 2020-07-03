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
        DB::table('categories')->insert(['name'=>'Chào mào']);
        DB::table('categories')->insert(['name'=>'Chích chòe']);
        DB::table('categories')->insert(['name'=>'Vành khuyên']);
        DB::table('categories')->insert(['name'=>'Cám chim']);
        DB::table('categories')->insert(['name'=>'Phụ kiện']);
    }
}
