<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
    $table->id();
    $table->foreignId('post_id')->constrained()->onDelete('cascade');
    $table->string('name');
    $table->string('email'); // renamed for convention
    $table->foreignId('parent_id')->nullable()->constrained('comments')->onDelete('cascade');
    $table->text('content');
    $table->unsignedInteger('likes_count')->default(0);
    $table->unsignedInteger('dislikes_count')->default(0);
    $table->timestamps();
});



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
