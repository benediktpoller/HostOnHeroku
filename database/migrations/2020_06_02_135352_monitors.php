<?php

use App\Models\Monitor;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Monitors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('monitors');

        Schema::create('monitors', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('label');
            $table->string('url');
            $table->integer('type')->default(1);
            $table->string('method')->default('get');
            $table->string('keyword_type')->nullable();
            $table->string('keyword_value')->nullable();
            $table->string('http_username')->nullable();
            $table->string('http_password')->nullable();
            //$table->json('headers')->nullable();
            $table->integer('port')->default(80);
            $table->integer('interval')->default(60);
            $table->integer('status')->default(200);
            $table->integer('monitor_group')->default(0);
            $table->boolean('is_group_main')->default(false);

            $table->boolean('enabled')->default(true);
            $table->boolean('ignore_ssl_errors')->default(false);
            $table->boolean('remind_ssl_expiry')->default(false);

            $table->timestampsTz();
            $table->softDeletes();
        });

        $m = new Monitor([
            'label' => 'AVL Test Preview',
            'url' => 'https://auth92.avl.com/openam/isAlive.jsp',
            'interval' => 5,
            'status' => 200
        ]);
        $m->save();

        $m = new Monitor([
            'label' => 'AVL Preview',
            'url' => 'https://auth2.avl.com/openam/isAlive.jsp',
            'interval' => 5,
            'status' => 200
        ]);

        $m = new Monitor([
            'label' => 'AVL',
            'url' => 'https://auth.avl.com/auth/isAlive.jsp',
            'interval' => 5,
            'status' => 200
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
        Schema::dropIfExists('monitors');
    }
}
