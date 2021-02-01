<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_agencies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('mowkel_id')->nullable();
            $table->foreign('mowkel_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('work_system_id')->nullable();
            $table->foreign('work_system_id')->references('id')->on('work_systems')->onDelete('cascade');
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
        Schema::dropIfExists('user_agencies');
    }
}
