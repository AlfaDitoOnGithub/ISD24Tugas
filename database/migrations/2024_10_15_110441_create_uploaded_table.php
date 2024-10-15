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
        Schema::create('uploaded', function (Blueprint $table) {
            $table->id();
            $table->string('First Name');
            $table->string('Last Name');
            $table->string('Company');
            $table->string('Phone Number');
            $table->string('Email Address');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uploaded');
    }
};
