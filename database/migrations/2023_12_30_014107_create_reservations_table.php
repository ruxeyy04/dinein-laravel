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
        Schema::create('reservation', function (Blueprint $table) {
            $table->increments('resno');
            $table->unsignedInteger('table_no');
            $table->unsignedInteger('userid');
            $table->datetime('datetimesched');
            $table->string('status', 30)->default('Pending');
            
            $table->foreign('table_no')->references('table_no')->on('table');
            $table->foreign('userid')->references('userid')->on('user');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
