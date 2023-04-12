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
        Schema::create('ice_cream', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang',10)->unique();
            $table->string('nama_ice',50)->nullable();
            $table->bigInteger('harga')->nullable();
            $table->bigInteger('qty')->nullable();
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
        Schema::dropIfExists('ice_cream');
    }
};
