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
        Schema::create('stored_data', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_fk_id');
            // $table->foreign('user_fk_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('temperature');
            $table->float('vibration');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stored_data');
    }
};
