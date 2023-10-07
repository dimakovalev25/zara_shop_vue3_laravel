<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('address', 45);
            $table->string('country', 255);
            $table->integer('zipcode')->nullable();
            $table->string('area', 255)->nullable();
            $table->string('city', 45)->nullable();
            $table->string('street', 45);
            $table->foreignId('customer_id')->references('id')->on('customers');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customer_addresses');
    }
};
