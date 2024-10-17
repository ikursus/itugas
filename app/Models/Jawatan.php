<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawatan extends Model
{
    use HasFactory;

    // Tetapkan nama table yang model Jawatan perlu hubungi
    protected $table = 'jawatan';
}
