<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MasaTanam extends Model
{
    use HasFactory;

    protected $table = 'masa_tanam';

    protected $fillable = [
        'periode',
    ];

    public function pertanian(): HasMany
    {
        return $this->hasMany(Pertanian::class);
    }
}
