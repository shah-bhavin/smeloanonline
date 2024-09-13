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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name', 1024)->nullable();
            $table->string('product_table', 1024)->nullable();
            $table->enum('product_type', ['1','2'])->default('1'); //1:Loan, 2:Subsidy
            $table->enum('status', ['1','2'])->default('1'); //1:Active, 2:Inactive
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
