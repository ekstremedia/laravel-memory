<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('memory_vehicle_mileages', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained('memory_vehicle_vehicles');
            $table->integer('current_mileage');
            $table->date('date_recorded');
            $table->string('source'); // e.g., 'fuel', 'service'
            $table->integer('source_id');
            $table->foreignId('created_by_id')->nullable()->constrained('users');
            $table->foreignId('last_edited_by_id')->nullable()->constrained('users');
            $table->uuid();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memory_vehicle_mileages');
    }
};
