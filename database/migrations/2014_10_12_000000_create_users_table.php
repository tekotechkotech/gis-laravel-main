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
            $table->uuid('id_user')->primary(); // Menggunakan UUID sebagai primary key
            $table->char('id_admin', 36)->nullable();// Menggunakan id dari sekolah siswa terkait
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['super admin', 'admin', 'user']); // Menambahkan kolom role dengan enum
            $table->enum('status', ['1', '0'])->default('0'); // Menambahkan kolom status dengan enum, default 1
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes(); // Menambahkan soft delete column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
