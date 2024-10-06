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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();

            $table->string('profile_photo_path')->nullable();
            $table->boolean('active')->default(0);
            $table->boolean('review')->default(0);

            $table->boolean('is_approved')->default(0);
            $table->boolean('is_admin')->default(0);
            $table->boolean('is_supervisor')->default(0);
            $table->boolean('is_worship_leader')->default(0);
            $table->boolean('is_associate_worship_leader')->default(0);
            $table->boolean('is_prayer_leader')->default(0);
            $table->boolean('is_section_leader')->default(0);
            $table->char('section', 12 )->nullable();
            $table->bigInteger('result_id')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('finish_date')->nullable();
            $table->dateTime('update_date')->nullable();
            $table->char('result_status', 100)->nullable();
            $table->unsignedBigInteger('designation_id')->nullable();
            $table->char('designation', 100)->nullable();
            $table->foreignId('supervisor_id')->nullable();
            $table->foreignId('department_id')->nullable();
            $table->char('supervisor', 254)->nullable();
            $table->char('super_email1', 100)->nullable();
            $table->date('effective_date')->nullable();
            $table->date('exit_date')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
