<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->date('date');
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('register_type_id');
            $table->foreign('member_id')->references('id')->on('members');
            $table->foreign('register_type_id')->references('id')->on('register_types');
            $table->boolean('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registers');
    }
};
