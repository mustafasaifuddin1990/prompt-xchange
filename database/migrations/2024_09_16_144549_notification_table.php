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
        Schema::create('notification_center', function (Blueprint $table) {
            $table->id();
            $table->string('sender_id')->nullable();
            $table->string('receiver_id')->nullable();
            $table->string('message')->nullable();
            $table->string('status')->nullable();
            $table->string('post_id')->nullable();
            $table->string('seen')->default(1);
            $table->string('All_count')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification_center');
    }
};
