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
        Schema::create('moods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('mood', ['Happy', 'Sad', 'Angry', 'Excited']);
            $table->text('note')->nullable();
            $table->date('entry_date');
            $table->softDeletes();
            $table->timestamps();
        
            $table->unique(['user_id', 'entry_date']); 
        });
        
    }

    
    public function down(): void
    {
        Schema::dropIfExists('moods');
       
    }
};
