<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasPerkara extends Model
{
    use HasFactory;

    public function tugas()
    {
        return $this->belongsTo(Tugas::class, 'tugas_id', 'id');
    }

    public function perkara()
    {
        return $this->belongsTo(Perkara::class, 'perkara_id', 'id');
    }
}
