<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('document');
            $table->string('security')->nullable();
            $table->string('email')->nullable();
            $table->string('guest');
            $table->string('name');
            $table->string('idCard');
            $table->string('police')->nullable();
            $table->string('company')->nullable();
            $table->string('meet');
            $table->string('purpose');
            $table->string('info');
            $table->string('status');
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
        Schema::dropIfExists('visitors');
    }
}
