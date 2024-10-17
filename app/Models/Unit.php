<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    // Daftarkan data yang dibenarkan masuk ke dalam table units (mass assignment)
    protected $fillable = [
        'bahagian_id',
        'name'
    ];

    public function bahagian()
    {
        return $this->belongsTo(Bahagian::class, 'bahagian_id', 'id');
    }
}
