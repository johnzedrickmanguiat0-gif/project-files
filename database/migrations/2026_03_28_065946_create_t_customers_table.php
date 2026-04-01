<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('t_customers', function (Blueprint $table) {
           $table->id();
           $table->string(column: 'cus_first_name');
           $table->string(column: 'cus_last_name');
           $table->string(column: 'cus_email')->unique();
           $table->string(column: 'cus_phone_number')->nullable();
           $table->string(column: 'cus_address')->nullable();
           $table->string(column: 'cus_city')->nullable();
           $table->string(column: 'cus_state')->nullable();
           $table->string(column: 'cus_postal_code')->nullable();
           $table->string(column: 'cus_country')->nullable();
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_customers');
    }
};
