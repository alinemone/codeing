<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrowsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('browsers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('browser_product', function (Blueprint $table) {
           $table->unsignedBigInteger('browser_id');
           $table->unsignedBigInteger('product_id');
           $table->primary(['browser_id','product_id']);
           $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
           $table->foreign('browser_id')->references('id')->on('browsers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('browser_product');
        Schema::dropIfExists('browsers');
    }
}
