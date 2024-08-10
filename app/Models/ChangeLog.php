<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChangeLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'table_name',
        'record_id',
        'field_name',
        'old_value',
        'new_value',
        'changed_by',
    ];
}
