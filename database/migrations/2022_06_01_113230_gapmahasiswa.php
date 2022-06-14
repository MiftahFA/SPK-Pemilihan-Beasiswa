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

        Schema::create('gapmahasiswa', function (Blueprint $table) {
            $table->integer('id')->unique();
            $table->integer('gap_ipk');
            $table->integer('gap_penghasilan');
            $table->integer('gap_tanggungan');
            $table->integer('gap_semester');
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
        Schema::dropIfExists('gapmahasiswa');
    }
};
