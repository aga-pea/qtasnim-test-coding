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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('barang_id')->unsigned();
            $table->index('barang_id');
            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('cascade');
            $table->integer('jenis_barang_id')->unsigned();
            $table->index('jenis_barang_id');
            $table->foreign('jenis_barang_id')->references('id')->on('jenis_barangs')->onDelete('cascade');
            $table->integer('stok');
            $table->integer('jumlah_terjual');
            $table->date('tanggal_transaksi');
            $table->timestamps();
        });

        DB::table('transaksis')->insert(
            [
               ['barang_id' => 1, 'jenis_barang_id' => 1, 'stok' => 100, 'jumlah_terjual' => 10, 'tanggal_transaksi' => '2021-05-01'],
               ['barang_id' => 2, 'jenis_barang_id' => 1, 'stok' => 100, 'jumlah_terjual' => 19, 'tanggal_transaksi' => '2021-05-05'],
               ['barang_id' => 1, 'jenis_barang_id' => 1, 'stok' => 90, 'jumlah_terjual' => 15, 'tanggal_transaksi' => '2021-05-10'],
               ['barang_id' => 3, 'jenis_barang_id' => 2, 'stok' => 100, 'jumlah_terjual' => 20, 'tanggal_transaksi' => '2021-05-11'],
               ['barang_id' => 4, 'jenis_barang_id' => 2, 'stok' => 100, 'jumlah_terjual' => 30, 'tanggal_transaksi' => '2021-05-11'],
               ['barang_id' => 4, 'jenis_barang_id' => 2, 'stok' => 100, 'jumlah_terjual' => 30, 'tanggal_transaksi' => '2021-05-11'],
               ['barang_id' => 5, 'jenis_barang_id' => 2, 'stok' => 100, 'jumlah_terjual' => 25, 'tanggal_transaksi' => '2021-05-12'],
               ['barang_id' => 2, 'jenis_barang_id' => 1, 'stok' => 81, 'jumlah_terjual' => 5, 'tanggal_transaksi' => '2021-05-12']
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
