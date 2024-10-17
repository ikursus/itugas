<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tugas';

    // Dapatkan rekod pemilik (user) tugas daripada table users
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Dapatkan senarai perkara yang ditandakan pada table tugas_perkaras
    public function senaraiPerkara()
    {
        return $this->hasMany(TugasPerkara::class, 'tugas_id', 'id');
    }
}
