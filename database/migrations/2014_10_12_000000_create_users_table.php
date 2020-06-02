<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('users');

        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('firstname', 100)->nullable();
            $table->string('lastname', 100)->nullable();

            $table->string('email', 100)->unique();
            $table->timestamp('email_verified_at')->nullable();

            // TODO unique phone (... handed over, office phone)
            $table->string('phone', 100)->nullable();
            $table->timestamp('phone_verified_at')->nullable();

            $table->rememberToken();

            $table->softDeletes();
            $table->timestampsTz();
        });

        $m = new User([
            'firstname' => 'Benedikt',
            'lastname' => 'Poller',
            'email' => 'benedikt.poller@gmail.com'
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
        Schema::dropIfExists('users');
    }
}
