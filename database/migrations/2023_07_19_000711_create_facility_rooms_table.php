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
        Schema::create('facility_rooms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('facility_id');
            $table->bigInteger('room_type_id');
            $table->string('name');
            $table->string('room_occupant_name');
            $table->string('slug');
            $table->string('description')->nullable();
            $table->boolean('status')->default(1)->comment('0=>de-active, 1=>active');
            $table->string('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facility_rooms');
    }
};
