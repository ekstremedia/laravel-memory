<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memory_vehicle_vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('registration_country')->nullable();
            $table->string('plate_number');
            $table->string('brand');
            $table->string('model');
            $table->integer('year')->nullable();
            $table->string('type')->nullable();
            $table->string('vin')->nullable();
            $table->date('registration_date')->nullable();
            $table->date('first_registration_date')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('owner_address')->nullable();
            $table->string('technical_classification')->nullable();
            $table->string('registration_district')->nullable();
            $table->string('color')->nullable();
            $table->integer('seating_capacity')->nullable();
            $table->integer('standing_capacity')->nullable();
            $table->string('fuel_type')->nullable();
            $table->integer('engine_performance')->nullable();
            $table->integer('permitted_total_weight')->nullable();
            $table->integer('empty_vehicle_weight')->nullable();
            $table->integer('permitted_load_weight')->nullable();
            $table->string('registration_status')->nullable();
            $table->string('vehicle_status')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('width')->nullable();
            $table->integer('length')->nullable();
            $table->boolean('condemned')->nullable();
            $table->foreignId('created_by_id')->nullable()->constrained('users');
            $table->foreignId('last_edited_by_id')->nullable()->constrained('users');
            $table->uuid();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memory_vehicle_vehicles');
    }
};
