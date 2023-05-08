<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string("role_name");
            $table->timestamps();
        });

        DB::table("roles")->insert([
            "role_name"=>"peternak"
        ]);
        DB::table("roles")->insert([
            "role_name"=>"dokter hewan"
        ]);
        DB::table("roles")->insert([
            "role_name"=>"supplier tahu"
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
