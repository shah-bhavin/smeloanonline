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
            $table->string('enterprise_name');
            $table->enum('enterprise_constitution', ['1','2' ,'3'])->default('1'); //1:Sole, 2:Private, 3:Public
            $table->string('enterprise_pan');
            $table->text('enterprise_office_address');
            $table->text('enterprise_factory_address');
            $table->enum('premises_type', ['1',' 2'])->default('1'); //1:Own, 2:Rental
            $table->enum('located_in_municipal_area', ['1','2'])->default('1'); //1:Yes, 2:No
            $table->string('telephone');
            $table->string('email');
            $table->string('website');
            $table->string('udaym_reg_no');
            $table->date('udyam_reg_date');
            $table->enum('enterprise_category', ['1','2'])->default('1'); //1:New, 2:Old
            $table->enum('enterprise_type', ['1','2' ,'3'])->default('1'); //1:Micro, 2:Small, 3:Midium
            $table->enum('enterprise_activity', ['1','2'])->default('1'); //1:Manufacturing, 2:Service
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
