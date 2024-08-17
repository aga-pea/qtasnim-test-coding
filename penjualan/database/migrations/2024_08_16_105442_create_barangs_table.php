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
        Schema::create('barangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_barang', 255);
            $table->timestamps();
        });

        DB::table('barangs')->insert(
            [
                ['nama_barang' => 'Kopi'],
                ['nama_barang' => 'Teh'],
                ['nama_barang' => 'Pasta Gigi'],
                ['nama_barang' => 'Sabun Mandi'],
                ['nama_barang' => 'Sampo']
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
