<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Banner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150);
            $table->string('link', 150);
            $table->string('image', 150)->unique();
            $table->integer('ordering')->nullable()->default(1);
            $table->tinyInteger('status')->nullable()->default(1);
            $table->text('content');
            $table->timestamps(); // auto create fields created_at and updated_at
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banner');
            //
    }
}