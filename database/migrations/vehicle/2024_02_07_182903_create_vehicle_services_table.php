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
        Schema::create('memory_vehicle_services', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained('memory_vehicle_vehicles');
            $table->date('date_of_service');
            $table->integer('mileage')->nullable();
            $table->string('service_center_name');
            $table->string('service_center_id')->nullable();
            $table->boolean('oil_service')->nullable();
            $table->boolean('total_service')->nullable();
            $table->boolean('long_life_service')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->date('date_paid')->nullable();
            $table->text('additional_work')->nullable();
            $table->date('next_service_date')->nullable();
            $table->integer('next_service_mileage')->nullable();
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
        Schema::dropIfExists('memory_vehicle_services');
    }
};
