<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('test_case_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('top_rated_image_id');
            $table->timestamps();

            $table->foreign('test_case_id')->references('id')->on('test_cases');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('top_rated_image_id')->references('id')->on('images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test');
    }
};
