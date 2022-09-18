<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlotterRecords extends Model
{
    protected $table = 'blotter_records';

    protected $fillable = [
        'user_id',
        'name',
        'type',
        'size'
    ];
    use HasFactory;
}
