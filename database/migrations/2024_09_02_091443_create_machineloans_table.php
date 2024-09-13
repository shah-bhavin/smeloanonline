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
        Schema::create('machineloans', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('cost_with_gst')->nullable();            
            $table->enum('machine_used_before', ['1','2'])->default('1')->nullable(); //1:Yes, 2:No
            $table->string('machine_ready_time')->nullable();
            $table->enum('status', ['1','2'])->default('1'); //1:Active, 2:Inactive
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('machineloans');
    }
};
