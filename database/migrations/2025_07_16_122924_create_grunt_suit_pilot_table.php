<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('grunt_suit_pilot', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grunt_suit_id')->constrained()->onDelete('cascade');
            $table->foreignId('pilot_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grunt_suit_pilot');
    }
};
