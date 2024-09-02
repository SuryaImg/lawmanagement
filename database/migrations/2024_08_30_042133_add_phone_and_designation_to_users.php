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
            $table->string('phone')->after('email')->nullable();
            $table->string('designation')->after('phone')->nullable();
            $table->string('added_by')->after('password')->nullable();
            $table->enum('status', ['0', '1'])->default(1)->after('remember_token')->comment('0=>Inactive , 1=> Active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone',  'designation',  'status',  'added_by']);
        });
    }
};
