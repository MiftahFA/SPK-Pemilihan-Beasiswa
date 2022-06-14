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
        Schema::create('hasil_mahasiswa', function (Blueprint $table) {
            $table->integer('id')->unique();
            $table->float('bobot_ipk');
            $table->float('bobot_penghasilan');
            $table->float('bobot_tanggungan');
            $table->float('bobot_semester');
            $table->float('ncf');
            $table->float('nsf');
            $table->float('hasil');
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
        Schema::dropIfExists('hasil_mahasiswa');
    }
};
