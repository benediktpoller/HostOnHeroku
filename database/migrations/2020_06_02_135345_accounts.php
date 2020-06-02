<?php

use App\Models\Account;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Accounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->boolean('enabled')->default(true);
            $table->integer('monitor_limit')->default(50);
            $table->integer('monitor_interval')->default(50);
            $table->integer('up_monitors')->default(50);
            $table->integer('down_monitors')->default(50);
            $table->integer('paused_monitors')->default(0);

            $table->timestampsTz();
            $table->softDeletes();
        });

        $m = new Account([
        ]);
        $m->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
