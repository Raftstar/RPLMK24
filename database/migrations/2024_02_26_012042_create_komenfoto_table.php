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
        Schema::create('komenfoto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('komen_id');
            $table->unsignedBigInteger('foto_id');
            $table->string('isikomen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komenfoto');
    }
};
