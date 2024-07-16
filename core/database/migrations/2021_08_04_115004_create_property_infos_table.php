<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('property_id')->nullable();
            $table->tinyInteger('kitchen')->default(0);
            $table->integer('bathroom')->default(0);
            $table->string('square_feet', 80)->nullable();
            $table->decimal('price', 28,8)->default(0);
            $table->date('available_time')->nullable();
            $table->text('optional_image')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('property_infos');
    }
}
