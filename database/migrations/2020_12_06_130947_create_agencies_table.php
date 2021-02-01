<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('mowkel_id')->nullable();
            $table->foreign('mowkel_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('mtawkel_id')->nullable();
            $table->foreign('mtawkel_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('center_id')->nullable();
            $table->foreign('center_id')->references('id')->on('centers')->onDelete('cascade');
            $table->boolean('is_acceptMtawkel')->default(0);
            $table->boolean('is_acceptManger')->default(0);
            $table->boolean('is_acceptMidani')->default(0);
            $table->text('replay');
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
        Schema::dropIfExists('agencies');
    }
}
