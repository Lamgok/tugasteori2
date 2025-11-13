<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa; // <-- Import Model kita
use Illuminate\View\View;

class MahasiswaController extends Controller
{
    /**
     * Menampilkan daftar semua mahasiswa.
     */
    public function index(): View
    {
        // Ambil semua data dari Model Mahasiswa
        $mahasiswas = Mahasiswa::all();

        // Kirim data ke view 'mahasiswa.index'
        return view('mahasiswa.index', ['mahasiswas' => $mahasiswas]);
    }
}