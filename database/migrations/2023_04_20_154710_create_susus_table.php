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
        Schema::create('susus', function (Blueprint $table) {
            $table->id();
            $table->float("volume");
            $table->dateTime("milk_at")->default(now());
            $table->dateTime("sold_at");
            $table->unsignedBigInteger("user_id");
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('susus');
    }
};
