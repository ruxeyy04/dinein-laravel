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
        Schema::create('foodreserve', function (Blueprint $table) {
            $table->increments('resfoodid');
            $table->unsignedInteger('food_id');
            $table->unsignedInteger('userid');
            $table->integer('quantity')->default(1);
            $table->string('status', 50)->default('Cart');
            $table->unsignedBigInteger('resno');
            
            $table->foreign('food_id')->references('food_id')->on('food');
            $table->foreign('userid')->references('userid')->on('user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foodreserve');
    }
};
