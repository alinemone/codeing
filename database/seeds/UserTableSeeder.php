<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'ادمین',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
            'email_verified_at'=> \Carbon\Carbon::now()
        ]);
        DB::table('users')->insert([
            'name' => 'یوزر',
            'username' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('12345678'),
            'email_verified_at'=> \Carbon\Carbon::now()
        ]);

        $role=  Role::create(['name' => 'Admin']);
        $role2=  Role::create(['name' => 'Seller']);
        $permission = Permission::create(['name' => 'super_user']);
        $permission2 = Permission::create(['name' => 'create_product']);

        $role->givePermissionTo($permission);
        $role2->givePermissionTo($permission2);

        \App\User::find(1)
        ->assignRole($role);

       $cat =  \AliBayat\LaravelCategorizable\Category::create(['name'=>'WordPress']);
       $subcat =  \AliBayat\LaravelCategorizable\Category::create(['name'=>'فروشگاهی']);
        $cat->appendNode($subcat);

        $cat1 =  \AliBayat\LaravelCategorizable\Category::create(['name'=>'HTML']);
        $subcat1 =  \AliBayat\LaravelCategorizable\Category::create(['name'=>'ادمین پنل']);
        $cat1->appendNode($subcat1);


        \App\design::create(['name'=>'متریال']);
        \App\design::create(['name'=>'رسپانسیو']);
        \App\design::create(['name'=>'مدرن']);

        \App\browser::create(['name'=>'chrome']);
        \App\browser::create(['name'=>'firefox']);
        \App\browser::create(['name'=>'edge']);

        \App\language_create::create(['name'=>'php']);
        \App\language_create::create(['name'=>'wordpress']);
        \App\language_create::create(['name'=>'python']);
        \App\language_create::create(['name'=>'node']);


        \App\filewithproduct::create(['name'=>'Html']);
        \App\filewithproduct::create(['name'=>'Css']);
        \App\filewithproduct::create(['name'=>'js']);
        \App\filewithproduct::create(['name'=>'Psd']);

    }
}
