<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Gym;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('adresses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Gym::class, 'owner');
            $table->string('city');
            $table->string('state');
            $table->string('district');
            $table->string('street');
            $table->string('number');
            $table->decimal('longitude', $precision = 3, $scale = 15);
            $table->decimal('latitude', $precision = 3, $scale = 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adresses');
    }
};
