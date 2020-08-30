<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilewithproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filewithproducts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('filewithproduct_product', function (Blueprint $table) {
            $table->unsignedBigInteger('filewithproduct_id');
            $table->unsignedBigInteger('product_id');
            $table->primary(['filewithproduct_id','product_id']);
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('filewithproduct_id')->references('id')->on('filewithproducts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filewithproducts');
        Schema::dropIfExists('filewithproduct_product');
    }
}
