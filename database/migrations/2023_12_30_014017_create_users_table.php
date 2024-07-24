<?php

use App\Models\User;
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
        Schema::create('user', function (Blueprint $table) {
            $table->increments('userid');
            $table->string('fname', 100);
            $table->string('lname', 100);
            $table->string('email', 50);
            $table->string('address', 250);
            $table->string('username', 50);
            $table->string('password', 255);
            $table->string('usertype', 50)->default('Customer');
            $table->timestamps();
        });

        User::insert([
            [
                'userid' => 1,
                'fname' => 'Shaina',
                'lname' => 'Calotes',
                'email' => 'admin@gmail.com',
                'address' => 'Ozamiz',
                'username' => 'admin',
                'password' => Hash::make('1234'),
                'usertype' => 'Admin',
                'created_at' => '2023-12-29 13:44:32',
                'updated_at' => '2023-12-29 13:44:32'
            ],
            [
                'userid' => 2,
                'fname' => 'Alex',
                'lname' => 'Ross',
                'email' => 'incharge@gmail.com',
                'address' => 'Ozamiz',
                'username' => 'incharge',
                'password' => Hash::make('1234'),
                'usertype' => 'Incharge',
                'created_at' => '2023-12-29 13:44:32',
                'updated_at' => '2023-12-29 13:44:32'
            ],
            [
                'userid' => 3,
                'fname' => 'John',
                'lname' => 'Doe',
                'email' => 'custome@gmail.com',
                'address' => 'Ozamiz',
                'username' => 'customer',
                'password' => Hash::make('1234'),
                'usertype' => 'Customer',
                'created_at' => '2023-12-29 13:44:32',
                'updated_at' => '2023-12-29 13:44:32'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
