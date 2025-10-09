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
      Schema::create('media', function (Blueprint $table) {
    $table->id();
    $table->foreignId('post_id')->constrained()->onDelete('cascade');
    $table->string('type'); // 'image', 'video', 'videotube', 'file'
    $table->string('path'); // storage path or URL
    $table->string('thumbnail')->nullable(); // only for videos
    $table->string('caption')->nullable();
    $table->integer('order')->default(0); // useful if multiple media per article
    $table->timestamps();
    
});

    }




    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
