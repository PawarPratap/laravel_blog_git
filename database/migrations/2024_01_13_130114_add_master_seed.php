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
        DB::table("users")
            ->insert([
                "email" => "pawar3p@gmail.com",
                "name" => "Pratap P",
                "password" => bcrypt("password")
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table("users")->where("email", "=", "pawar3p@gmail.com")->delete();
    }
};
