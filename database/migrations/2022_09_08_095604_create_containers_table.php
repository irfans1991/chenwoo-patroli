<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('containers', function (Blueprint $table) {
            $table->id();
            $table->string('security');
            $table->string('driver');
            $table->string('police');
            $table->string('status_container');
            $table->string('company');
            $table->string('no_container');
            $table->string('no_seal');
            $table->string('type_container');
            $table->string('destination');
            $table->string('position');
            $table->string('volume');
            $table->string('before_temperature');
            $table->string('after_temperature')->nullable();
            $table->string('photo');
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
        Schema::dropIfExists('containers');
    }
}
