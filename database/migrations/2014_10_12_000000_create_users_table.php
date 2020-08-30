<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('phone',14)->nullable();
            $table->string('profile_image')->default('/img/defult_user_avatar.png');
            $table->string('store_image')->default('/img/defult-store-banner.jpg');
            $table->text('store_info')->nullable();
            $table->boolean('store_active')->default(0);
            $table->string('store_name',50)->nullable();
            $table->string('store_url',50)->nullable()->unique();
            $table->string('selling_type')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('storeSeoTitle')->nullable();
            $table->string('storeSeoDescription')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
