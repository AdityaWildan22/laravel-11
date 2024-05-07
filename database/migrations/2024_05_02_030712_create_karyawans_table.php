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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nip',10);
            $table->string('nama',100);
            $table->string('username',50);
            $table->string('password',100);
            $table->string('jabatan',50);
            $table->string('alamat',100);
            $table->enum('jenis_kelamin',['Laki-laki','Perempuan']);
            $table->enum('role',['SuperAdmin','Admin','User']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};