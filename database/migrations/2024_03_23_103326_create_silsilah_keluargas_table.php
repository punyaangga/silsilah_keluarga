<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('silsilah_keluargas', function (Blueprint $table) {
            $table->id();
            $table->string('nama',100);
            $table->string('jenis_kelamin',10);
            $table->unsignedBigInteger('id_orang_tua')->nullable();
        });
        DB::table('silsilah_keluargas')->insert([
            ['nama' => 'Budi', 'jenis_kelamin' => 'laki-laki', 'id_orang_tua' => null],
            ['nama' => 'Dedi', 'jenis_kelamin' => 'laki-laki', 'id_orang_tua' => 1],
            ['nama' => 'Dodi', 'jenis_kelamin' => 'laki-laki', 'id_orang_tua' => 1],
            ['nama' => 'Dede', 'jenis_kelamin' => 'laki-laki', 'id_orang_tua' => 1],
            ['nama' => 'Dwi', 'jenis_kelamin' => 'perempuan', 'id_orang_tua' => 1],
            ['nama' => 'Feri', 'jenis_kelamin' => 'laki-laki', 'id_orang_tua' => 2],
            ['nama' => 'Farah', 'jenis_kelamin' => 'perempuan', 'id_orang_tua' => 2],
            ['nama' => 'Gugus', 'jenis_kelamin' => 'laki-laki', 'id_orang_tua' => 3],
            ['nama' => 'Gandi', 'jenis_kelamin' => 'laki-laki', 'id_orang_tua' => 3],
            ['nama' => 'Hani', 'jenis_kelamin' => 'perempuan', 'id_orang_tua' => 4],
            ['nama' => 'Hana', 'jenis_kelamin' => 'perempuan', 'id_orang_tua' => 4],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('silsilah_keluargas');
    }
};
