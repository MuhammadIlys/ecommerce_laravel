<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;


class Productseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $product = new Product;
        // $p_name = $request->product_name;
        // $p_desc = $request->product_description;
        // $p_price = $request->product_price;
        // $p_discount = $request->product_discount;
        // $p_quantity= $request->product_quantity;
        // $p_category = $request->product_category;
        $faker = Faker::create();

        // for($a=1;$a<=100;$a++)
        // {
        // $product = new Product;
        // $p_name = $faker->word();;
        // $p_desc = 'In publishing and graphic design, Lorem ipsum is a commonly used to';
        // $p_price = 12;
        // $p_discount = 11;
        // $p_quantity= 3;
        // $p_category = 'tech';
        // $p_image = 'mouse.png';

        // $product->title = $p_name;
        // $product->description = $p_desc;
        // $product->image = $p_image;
        // $product->category = $p_category;
        // $product->quantity = $p_quantity;
        // $product->price = $p_price;
        // $product->discount_price = $p_discount;
        // $product->save();
        // }
    }
}
