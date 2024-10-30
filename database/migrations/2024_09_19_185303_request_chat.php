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
        Schema::create('request_chat', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('vendor_id');
            $table->string('status')->default('accepted');
            $table->string('count_request')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('request_chat');
    }
};
