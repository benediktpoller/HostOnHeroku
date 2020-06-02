<?php

use App\Models\Contact;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Contacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->boolean('enabled')->default(true);
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->nullable();
            $table->timestamp('phone_verified_at')->nullable();

            $table->timestampsTz();
            $table->softDeletes();
        });

        $contact = new Contact([
            'name' => 'Benedikt Poller',
            'email' => 'benedikt.poller+contact@gmail.com'
        ]);
        $contact->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
