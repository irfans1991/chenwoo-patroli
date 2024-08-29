<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transportations', function (Blueprint $table) {
            $table->id();
            $table->string('transport');
            $table->string('name');
            $table->string('driver');
            $table->string('condition');
            $table->string('destination');
            $table->string('status');
            $table->string('security');
            $table->integer('before_speedometer')->length(11);
            $table->integer('after_speedometer')->length(11)->nullable();
            $table->integer('fuel')->length(11)->nullable();
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
        Schema::dropIfExists('transportations');
    }
}
