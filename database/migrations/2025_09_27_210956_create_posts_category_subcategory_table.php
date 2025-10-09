<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     public function up(): void {
        Schema::create('post_category_subcategory', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('sub_category_id')->constrained()->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['post_id','category_id','sub_category_id']);
        });
    }

    public function down(): void {
        Schema::dropIfExists('post_category_subcategory');
    }
};
