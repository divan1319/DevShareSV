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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('repo');
            $table->char('privacy',50);
            $table->char('status',50);
            $table->integer('limit_requets')->default(5);
            $table->foreignId('technology_id')->constrained('technologies');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->date('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
