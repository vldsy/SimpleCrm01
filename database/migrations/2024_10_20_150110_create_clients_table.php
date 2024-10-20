<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('contact_name');
            $table->string('contact_email')->unique();
            $table->string('contact_phone_number')->nullable();
            $table->string('company_name');
            $table->string('company_address')->nullable();
            $table->string('company_city')->nullable();
            $table->string('company_zip')->nullable();
            $table->integer('company_vat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
