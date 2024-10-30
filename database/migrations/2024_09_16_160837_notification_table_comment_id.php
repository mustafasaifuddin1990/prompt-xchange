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
        Schema::table('notification_center', function (Blueprint $table) {
            $table->unsignedBigInteger('comment_id')->nullable()->after('post_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notification_center', function (Blueprint $table) {
            $table->dropColumn('comment_id');
        });
    }
};
