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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->required();
            $table->string('lot');
            $table->string('mail_address')->required();
            $table->boolean('ecommunication')->required();
            $table->string('bill_address')->required();
            $table->string('emergency_name')->required();
            $table->string('emergency_phone')->required();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('lot');
            $table->dropColumn('mail_address');
            $table->dropColumn('ecommunication');
            $table->dropColumn('bill_address');
            $table->dropColumn('emergency_name');
            $table->dropColumn('emergency_phone');
        });
    }
};
