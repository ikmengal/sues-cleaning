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
        Schema::create('facility_services', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('facility_id');
            $table->bigInteger('room_id');
            $table->bigInteger('parent_service_id')->nullable();
            $table->bigInteger('service_id');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facility_services');
    }
};
