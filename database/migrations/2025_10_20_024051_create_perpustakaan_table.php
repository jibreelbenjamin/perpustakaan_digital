<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id('id_category');
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });
        Schema::create('books', function (Blueprint $table) {
            $table->id('id_book');
            $table->string('title');
            $table->string('author');
            $table->string('publisher')->nullable();
            $table->year('year')->nullable();
            $table->foreignId('id_category')->constrained('categories', 'id_category')->onDelete('cascade');
            $table->integer('stock')->default(0);
            $table->timestamps();
        });
        Schema::create('borrowings', function (Blueprint $table) {
            $table->id('id_borrowing');
            $table->foreignId('petugas')->constrained('users', 'id_user')->onDelete('cascade');
            $table->foreignId('id_book')->constrained('books', 'id_book')->onDelete('cascade');
            $table->date('borrow_date');
            $table->date('return_date')->nullable();
            $table->enum('status', ['dipinjam', 'dikembalikan', 'terlambat', 'hilang'])->default('dipinjam');
            $table->timestamps();
        });
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users', 'id_user')->onDelete('set null');
            $table->string('action');
            $table->text('description')->nullable();
            $table->ipAddress('ip_address')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('books');
        Schema::dropIfExists('borrowings');
        Schema::dropIfExists('activity_logs');
    }
};
