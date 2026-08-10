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
        Schema::create('car_listings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->foreignId('brand_id')
                ->constrained('brands')
                ->onDelete('restrict');

            $table->foreignId('city_id')
                ->constrained('cities')
                ->onDelete('restrict');

            $table->string('title');
            $table->string('model');
            $table->year('year');
            $table->decimal('price', 12, 2);
            $table->unsignedInteger('mileage');

            $table->string('fuel_type');
            $table->string('transmission');

            $table->text('description');

            $table->string('status')
                ->default('pending');

            $table->boolean('is_featured')
                ->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_listings');
    }
};
