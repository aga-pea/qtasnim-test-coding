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
        Schema::create('jenis_barangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jenis_barang', 255);
            $table->timestamps();
        });

        DB::table('jenis_barangs')->insert(
            [
                ['jenis_barang' => 'Konsumsi'],
                ['jenis_barang' => 'Pembersih']
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_barangs');
    }
};
