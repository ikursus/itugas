<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahagian extends Model
{
    use HasFactory;

    protected $table = 'bahagian';

    protected $fillable = [
        'name',
        'is_enabled'
    ];
}
