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
        Schema::create('certificates', function (Blueprint $table) {

            $table->id();

            $table->foreignId('member_id')->constrained()->onDelete('cascade');

            $table->string('certificate_number')->unique();

            $table->string('certificate_title');

            $table->date('issue_date');

            $table->date('expiry_date')->nullable();

            $table->enum('status', [
                'Valid',
                'Expired',
                'Revoked'
            ])->default('Valid');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};