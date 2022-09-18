<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialReport extends Model
{
    protected $table = 'financial_reports';

    protected $fillable = [
        'user_id',
        'name',
        'type',
        'size'
    ];
    use HasFactory;
}
