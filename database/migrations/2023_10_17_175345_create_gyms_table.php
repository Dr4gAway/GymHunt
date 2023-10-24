<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gyms', function (Blueprint $table) {
            $table->id();
            $table->string('cnpj');
            $table->integer('open_schedule');
            $table->integer('close_schedule');
            $table->string('city');
            $table->string('state');
            $table->string('district');
            $table->string('street');
            $table->string('number');
            $table->decimal('longitude', $precision = 18, $scale = 15);
            $table->decimal('latitude', $precision = 18, $scale = 15);
            $table->foreignIdFor(User::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gyms');
    }
};
