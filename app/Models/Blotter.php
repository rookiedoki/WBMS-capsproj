<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blotter extends Model
{
    use HasFactory;
    protected $fillable = [
        'complainant',
        'respondent',
        'victim',
        'location',
        'date',
        'time',
        'details',
        'status',
    ];
}
