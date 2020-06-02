<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mwindow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mwindow', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('label');
            $table->string('monitor');
            $table->integer('type');
            $table->string('start_time');
            $table->integer('duration');

            $table->timestampsTz();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mwindow');
    }
}
