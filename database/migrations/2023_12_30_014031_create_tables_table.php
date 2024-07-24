<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('table', function (Blueprint $table) {
            $table->increments('table_no');
            $table->integer('capacity');
            $table->text('location');
            $table->string('status', 50);
            $table->timestamps(); // Optional, adds created_at and updated_at columns
        });

        DB::table('table')->insert([
            ['table_no' => 1, 'capacity' => 2, 'location' => '1st floor at right side', 'status' => 'Available'],
            ['table_no' => 2, 'capacity' => 2, 'location' => '1st floor near the entrance', 'status' => 'Available'],
            ['table_no' => 3, 'capacity' => 4, 'location' => '1st floor near the exit', 'status' => 'Available'],
            ['table_no' => 4, 'capacity' => 4, 'location' => '1st floor at left side', 'status' => 'Available'],
            ['table_no' => 5, 'capacity' => 6, 'location' => '1st floor at right side', 'status' => 'Not Available'],
            ['table_no' => 6, 'capacity' => 2, 'location' => '1st floor at left side', 'status' => 'Maintenace'],
            ['table_no' => 7, 'capacity' => 2, 'location' => '1st floor near the entrance', 'status' => 'Available'],
            ['table_no' => 8, 'capacity' => 4, 'location' => '1st floor near the exit', 'status' => 'Available'],
            ['table_no' => 9, 'capacity' => 6, 'location' => '1st floor at right side', 'status' => 'Available'],
            ['table_no' => 10, 'capacity' => 6, 'location' => '1st floor at left side', 'status' => 'Available'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};
