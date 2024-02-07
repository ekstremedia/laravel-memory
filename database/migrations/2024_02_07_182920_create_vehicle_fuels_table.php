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
        Schema::create('memory_vehicle_fuels', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained('memory_vehicle_vehicles');
            $table->date('date_of_fuel');
            $table->integer('mileage')->nullable();
            $table->string('fuel_station_name')->nullable();
            $table->string('fuel_station_id')->nullable();
            $table->string('fuel_type')->nullable();
            $table->integer('fuel_quantity');
            $table->integer('fuel_price')->nullable();
            $table->integer('total_price')->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('memory_vehicle_fuels');
    }
};
