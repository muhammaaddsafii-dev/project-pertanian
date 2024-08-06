<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Penggarap extends Model
{
    use HasFactory;

    protected $table = 'penggarap';

    protected $fillable = [
        'nama',
        'nik',
        'alamat',
    ];

    public function pertanian(): HasMany
    {
        return $this->hasMany(Pertanian::class);
    }
}
