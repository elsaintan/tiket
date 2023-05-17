<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booked_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('booking_code');
            $table->foreignId('tid');
            $table->string('name');
            $table->string('email');
            $table->string('id_number');
            $table->string('ttl');
            $table->string('kewarganegaraan');
            $table->string('no_hp');
            $table->integer('is_checked')->default('0');;
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
        Schema::dropIfExists('booked_tickets');
    }
};
