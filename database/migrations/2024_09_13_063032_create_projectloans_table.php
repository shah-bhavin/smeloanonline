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
        Schema::create('projectloans', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('cost_of_land')->nullable(); 
            $table->string('cost_of_construction')->nullable();            
            $table->string('cost_with_gst')->nullable();            
            $table->string('project_line')->nullable();            
            $table->enum('project_stage', ['1','2', '3','4'])->default('1')->nullable(); //1:Land acquired, 2:Identified, 3:Construction started, 4:Machine ordered
            $table->string('production_start_time')->nullable();
            $table->enum('status', ['1','2'])->default('1'); //1:Active, 2:Inactive
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projectloans');
    }
};
