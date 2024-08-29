<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotaBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_barangs', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nota', 20)->foreignId();
            $table->string('pembeli');
            $table->string('jenisPembeli');
            $table->string('pembuat');
            $table->string('penimbang');
            $table->string('disetujui')->nullable();
            $table->string('foto')->nullable();
            $table->string('checked_by')->nullable();
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
        Schema::dropIfExists('nota_barangs');
    }
}
