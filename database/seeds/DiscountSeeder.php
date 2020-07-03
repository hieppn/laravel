<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Discount;
class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discounts')->insert(['code'=>'abc','percent'=>'12']);
        DB::table('discounts')->insert(['code'=>'cd','percent'=>'5']);
        DB::table('discounts')->insert(['code'=>'de','percent'=>'13']);
        DB::table('discounts')->insert(['code'=>'ad','percent'=>'27']);
        DB::table('discounts')->insert(['code'=>'abs2','percent'=>'45']);
    }
}
