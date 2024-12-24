<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaporTest extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'nis',
        'nilai_dari_AI',
    ];
}
