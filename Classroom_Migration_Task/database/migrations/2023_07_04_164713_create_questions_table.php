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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('classroom_id')
            ->constrained('classrooms' , 'id' )
            ->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('type' , ['short_answer' , 'multiple_choice']);
            $table->enum('visibility' , ['public' , 'private'])->default('public');
            $table->enum('status' , ['published' , 'draft'])->default('published');
            $table->integer('point')->default(100);
            $table->date('due_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
