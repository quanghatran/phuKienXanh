<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 150);
            $table->string('slug', 150)->nullable();
            $table->string('image', 150)->nullable();
            $table->string('image_list');
            $table->integer('price');
            $table->integer('sale_price');
            $table->integer('category_id')->unsigned();

            $table->tinyInteger('status')->nullable()->default(1);
            $table->text('content');
            $table->timestamps(); // auto create fields created_at and updated_at

            $table->foreign('category_id')->reference('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
        //
    }
}
