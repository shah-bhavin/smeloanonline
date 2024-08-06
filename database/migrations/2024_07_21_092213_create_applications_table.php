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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('applicants_name');
            $table->string('applicants_mobile');
            $table->string('applicants_city');
            $table->string('loan_time')->nullable();
            $table->integer('product_type')->default('2'); //1:Loan, 2:Subsidy
            $table->enum('status', ['1','2'])->default('1'); //1:Active, 2:Inactive
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
