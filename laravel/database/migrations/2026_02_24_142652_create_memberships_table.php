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
        Schema::create('memberships', function (Blueprint $table) {
            $table->id('membershipId');
            $table->string('role');
            $table->timestamps('joinedAt');
            $table->dateTime('leftAt')->nullable();
            $table->boolean('isActive')->default(true);

            $table->foreignId('person_id')->constrained('persons')->cascadeOnDelete();
            $table->foreignId('colocation_id')->constrained('colocations')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memberships');
    }
};
