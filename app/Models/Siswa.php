<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function nilai()
    {
        return $this->hasMany(Nilai::class);
    }

    function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
