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
        Schema::create('examples', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('descripcion');
            $table->double('price', 8, 2); 
            $table->string('photo');
            $table->timestamps('false');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examples');
    }
};
