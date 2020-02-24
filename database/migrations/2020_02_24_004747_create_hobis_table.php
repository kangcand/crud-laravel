<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHobisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hobis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hobi');
            $table->timestamps();
        });

         Schema::create('mahasiswa_hobi', function (Blueprint $table) {
            $table->unsignedBigInteger('id_mahasiswa');
            $table->unsignedBigInteger('id_hobi');

            $table->primary(['id_mahasiswa','id_hobi']);
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
        Schema::dropIfExists('hobis');
        Schema::dropIfExists('mahasiswa_hobi');
    }
}
