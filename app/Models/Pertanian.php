<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pertanian extends Model
{
    use HasFactory;

    protected $table = 'pertanian';

    protected $fillable = [
        'dnop',
        'desa_id',
        'kelompok_tani_id',
        'erdkk_id',
        'pemilik_id',
        'penggarap_id',
        'penyewa_id',
        'komoditas_id',
        'masa_tanam_id',
        'produktivitas_id',
        'jumlah_ptk',
        'subsidi_pupuk',
        'alat_sistem_tanam',
        'sumber_air',
        'nama_daerah',
        'luas',
        'shape_leng',
        'shape_area',
        'geom',
    ];

    protected $casts = [
        'luas' => 'decimal:2',
        'shape_leng' => 'decimal:15',
        'shape_area' => 'decimal:15',
    ];

    public function desa(): BelongsTo
    {
        return $this->belongsTo(Desa::class);
    }

    public function kelompokTani(): BelongsTo
    {
        return $this->belongsTo(KelompokTani::class);
    }

    public function erdkk(): BelongsTo
    {
        return $this->belongsTo(Erdkk::class);
    }

    public function pemilik(): BelongsTo
    {
        return $this->belongsTo(Pemilik::class);
    }

    public function penggarap(): BelongsTo
    {
        return $this->belongsTo(Penggarap::class);
    }

    public function penyewa(): BelongsTo
    {
        return $this->belongsTo(Penyewa::class);
    }

    public function komoditas(): BelongsTo
    {
        return $this->belongsTo(Komoditas::class);
    }

    public function masaTanam(): BelongsTo
    {
        return $this->belongsTo(MasaTanam::class);
    }

    public function produktivitas(): BelongsTo
    {
        return $this->belongsTo(Produktivitas::class);
    }
}
