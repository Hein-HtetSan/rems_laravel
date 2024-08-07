<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('property_id');
            $table->unsignedInteger('agent_id');
            $table->id();
            $table->string('address', 200);
            $table->string('city', 100);
            $table->string('state', 50);
            $table->string('zip_code', 10);
            $table->string('property_type', 50);
            $table->decimal('price', 18, 2);
            $table->decimal('size', 18, 2);
            $table->integer('number_of_bedrooms');
            $table->integer('number_of_bathrooms');
            $table->integer('year_built');
            $table->string('description')->nullable();
            $table->string('status', 50)->nullable();
            $table->string('availiablity_type', 50);
            $table->integer('minrental_period');
            $table->string('approvedby', 50);
            $table->dateTime('adddate')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('editdate')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
            $table->foreign('agent_id')->references('agent_id')->on('agents');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};