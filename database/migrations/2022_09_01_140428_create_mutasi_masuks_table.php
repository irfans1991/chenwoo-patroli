<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMutasiMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutasi_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('security');
            $table->string('type_mutasi');
            $table->string('supplier_name');
            $table->string('from');
            $table->string('supplier');
            $table->string('driver');
            $table->string('police');
            $table->string('total_items');
            $table->string('unit');
            $table->string('travel_permit');
            $table->string('remark');
            $table->string('nota')->nullable();
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
        Schema::dropIfExists('mutasi_masuks');
    }
}
