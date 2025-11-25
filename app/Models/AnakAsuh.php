<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnakAsuh extends Model
{
    use HasFactory;
    protected $table = 'anak_asuh'; // Nama tabel di database

    protected $fillable = [
        'nama',
        'tanggal_lahir',
        'jenis_kelamin',
         'mukim_nonmukim',
    ];
}
