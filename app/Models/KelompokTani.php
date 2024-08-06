<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KelompokTani extends Model
{
    use HasFactory;

    protected $table = 'kelompok_tani';

    protected $fillable = [
        'nama',
        'blok',
        'jabatan'
    ];

    public function pertanian(): HasMany
    {
        return $this->hasMany(Pertanian::class);
    }
}
