<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->integer('city_id')->nullable();
            $table->integer('location_id')->nullable();
            $table->string('title')->nullable();
            $table->string('video_link')->nullable();
            $table->tinyInteger('type')->default(0)->comment('Rent : 1, Sale : 2');
            $table->string('name',80)->nullable();
            $table->string('email', 60)->nullable();
            $table->string('phone', 40)->nullable();
            $table->text('social_media')->nullable();
            $table->tinyInteger('status')->default(0)->comment('pending : 0, approved : 1, cancel : 2');
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
        Schema::dropIfExists('properties');
    }
}
