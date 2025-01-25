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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->string('email')->unique(); 
            $table->string('phone')->nullable(); 
            $table->text('address')->nullable();
            $table->enum('group', ['Individual', 'Company', 'VIP']); 
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade'); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
