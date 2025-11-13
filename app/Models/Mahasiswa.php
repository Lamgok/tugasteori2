<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'tbl_mahasiswa';
    protected $primaryKey = 'nim';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nim',
        'nama_mahasiswa',
        'foto_url',
        'username',
        'email_akademik',
        'angkatan',
        'tgl_masuk',
        'program_studi',
        'kelas',
        'wali_mahasiswa',
        'jalur_usm',
        'status_akhir',
    ];
}