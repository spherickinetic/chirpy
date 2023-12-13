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
        Schema::create('followers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(
                table: 'users',
                indexName: 'follower_user_id'
            )->cascadeOnUpdate();
            $table->foreignId('follower_id')->constrained(
                table: 'users',
                indexName: 'follower_follower_id'
            )->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('followers');
    }
};
