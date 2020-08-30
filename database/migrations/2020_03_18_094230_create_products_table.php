<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title');
            $table->string('slug');
            $table->string('small_image')->default('/img/demo80.png');
            $table->string('large_image')->default('/img/demo590.jpg');
            $table->string('fileUrl')->default('localhost');
            $table->text('body');
            $table->string('seoTitleFa');
            $table->string('seoTitleEn');
            $table->string('seoDescription');
            $table->boolean('product_help');
            $table->boolean('product_support');
            $table->text('productSupportPrice');
            $table->string('demoUrl');
            $table->string('price');
            $table->boolean('sell_status');
            $table->boolean('sell_status_which');
            $table->text('message')->nullable();
            $table->softDeletes()->nullable();
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
        Schema::dropIfExists('products');
    }
}
