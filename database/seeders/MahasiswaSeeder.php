<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menghapus semua data lama dari tabel
        DB::table('tbl_mahasiswa')->truncate();

        // Membuat record Mahasiswa baru
        Mahasiswa::create([
            'nim' => '11523002',
            'nama_mahasiswa' => 'Lamgok Hando Siahaan',
            'foto_url' => 'https://apipuro.del.ac.id/v1/file/ef767587a18bcdd6d13ec1fc2ba5c705',
            'username' => 'ifs23010',
            'email_akademik' => 'ifs23002@students.del.ac.id',
            'angkatan' => 2023,
            'tgl_masuk' => '2023-08-01',
            'program_studi' => 'S1 Informatika',
            'kelas' => 'I3IF1',
            'wali_mahasiswa' => 'Herimanto, S.Kom, M.Kom',
            'jalur_usm' => 'USM 1',
            'status_akhir' => 'Aktif',
        ]);
    }
}