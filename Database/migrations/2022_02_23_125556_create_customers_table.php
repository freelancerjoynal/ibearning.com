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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('status');
            $table->string('type')->nullable();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('phone');
            $table->string('whatsapp')->nullable();
            $table->string('birthDate')->nullable();
            $table->string('gender');
            $table->string('country');
            $table->string('city')->nullable();
            $table->integer('postalCode')->nullable();
            $table->string('language')->nullable();      
            $table->integer('point')->nullable();
            $table->string('facebook')->nullable();
            $table->string('paymenMethod')->nullable();
            $table->string('paymenAddress')->nullable(); 
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
        Schema::dropIfExists('customers');
    }
};
