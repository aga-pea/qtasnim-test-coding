<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Kyslik\ColumnSortable\Sortable;

class Transaksi extends Model
{

    use Sortable;
    
    protected $fillable = [
        'barang_id',
        'jenis_barang_id',
        'stok',
        'jumlah_terjual',
        'tanggal_transaksi',
    ];

    protected $sortable = [
        'barang_id',
        'jenis_barang_id',
        'stok',
        'jumlah_terjual',
        'tanggal_transaksi',
    ];

    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    public function jenisBarang(): BelongsTo
    {
        return $this->belongsTo(JenisBarang::class, 'jenis_barang_id');
    }
}
