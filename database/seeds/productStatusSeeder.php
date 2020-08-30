<?php

use Illuminate\Database\Seeder;

class productStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Productstatus::create([
            'name'=>'تایید'
        ]);
        \App\Productstatus::create([
            'name'=>'عدم تایید'
        ]);
        \App\Productstatus::create([
            'name'=>'ویژه'
        ]);
        \App\Productstatus::create([
            'name'=>'توقف فروش'
        ]);
        \App\Productstatus::create([
            'name'=>'بروزرسانی'
        ]);
        \App\Productstatus::create([
            'name'=>'نقص فایل ها'
        ]);

    }
}
