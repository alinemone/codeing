<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'user_id'=>'2',
        'title'=>$faker->title,
        'slug'=>$faker->slug,
        'small_image'=>'https://via.placeholder.com/80x80',
        'large_image'=>'https://via.placeholder.com/590x300',
        'fileUrl'=>'persiamkv.ir',
        'body'=>$faker->text,
        'seoTitleFa'=>$faker->title,
        'seoTitleEn'=>$faker->title,
        'seoDescription'=>$faker->title,
        'product_help'=>0,
        'product_support'=>0,
        'productSupportPrice'=>'4000',
        'demoUrl'=>'persiamkv.ir',
        'price'=>'45854',
        'sell_status'=>1,
        'sell_status_which'=>1,
        'created_at'=>now(),
        'updated_at'=>now(),
        'message'=>$faker->title,


    ];
});
$factory->define(\App\Productstatus::class, function ($faker) use ($factory) {

    return [

        'productstatus_id' => '1',
        'product_id' => factory(Product::class)->create()->id

    ];
});

$factory->define(\AliBayat\LaravelCategorizable\Category::class, function ($faker) use ($factory) {

    return [

        'category_id' => rand([1],[4]),
        'model_type' => 'App\Product',
        'model_id' => factory(Product::class)->create()->id
    ];
});
