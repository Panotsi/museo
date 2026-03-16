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
        Schema::create('artifacts', function (Blueprint $table) {
        $table->id();

        $table->string('accession_number');
        $table->string('name_of_object');
        $table->string('material');
        $table->string('type');
        $table->text('remarks')->nullable();

        $table->string('excavation_site')->nullable();
        $table->date('excavation_date')->nullable();

        $table->date('date_recorded')->nullable();
        $table->string('recorded_by')->nullable();

        // Measurements
        $table->float('length_cm')->nullable();
        $table->float('height_cm')->nullable();
        $table->float('width_cm')->nullable();
        $table->float('rim_diameter_cm')->nullable();
        $table->float('base_diameter_cm')->nullable();
        $table->float('thickness_cm')->nullable();

        // Conservation
        $table->text('condition_before')->nullable();
        $table->text('conservation_process')->nullable();
        $table->text('condition_after')->nullable();

        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artifacts');
    }
};
