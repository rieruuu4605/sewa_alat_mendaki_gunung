<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->text('alamat')->nullable()->change();
            $table->string('telepon')->nullable()->change();
            $table->integer('kodepos')->nullable()->change();
            $table->string('jeniskelamin')->nullable()->change();
            $table->string('image')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->text('alamat')->nullable(false)->change();
            $table->string('telepon')->nullable(false)->change();
            $table->integer('kodepos')->nullable(false)->change();
            $table->string('jeniskelamin')->nullable(false)->change();
            $table->string('image')->nullable(false)->change();
        });
    }
};