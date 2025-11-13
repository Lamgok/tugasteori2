<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Mahasiswa</title>

    {{-- Font Bunny & Styling --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Inter:400,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Setting Dark Mode berdasarkan preferensi sistem --}}
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

{{-- Latar belakang modern dan transisi halus untuk Dark Mode --}}
<body class="bg-gray-50 text-gray-800 dark:bg-gray-900 dark:text-gray-100 transition-colors duration-300">
    <div class="container mx-auto max-w-5xl py-16 px-4 sm:px-6 lg:px-8">

        {{-- Header Halaman --}}
        <div class="mb-12 border-b border-gray-200 dark:border-gray-700 pb-4">
            <h1 class="text-4xl font-extrabold text-indigo-600 dark:text-indigo-400">
                Data Mahasiswa
            </h1>
            <p class="mt-2 text-lg text-gray-500 dark:text-gray-400">
                Daftar lengkap informasi seluruh mahasiswa.
            </p>
        </div>

        {{-- Kontainer Daftar Mahasiswa --}}
        <div class="space-y-8">
            @foreach ($mahasiswas as $mhs)
                {{-- Kartu Mahasiswa yang Ditingkatkan --}}
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-2xl transition duration-300 overflow-hidden p-6 sm:p-8 border border-gray-100 dark:border-gray-700/50">
                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6">

                        {{-- Foto Mahasiswa (Lebih Besar dan Menarik) --}}
                        <div class="flex-shrink-0 w-full sm:w-32 h-32">
                            <img class="w-full h-full rounded-lg object-cover ring-4 ring-indigo-500/30 dark:ring-indigo-400/30"
                                src="{{ $mhs->foto_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($mhs->nama_mahasiswa) . '&background=6366F1&color=fff&size=256&bold=true' }}"
                                alt="Foto {{ $mhs->nama_mahasiswa }}"
                                loading="lazy"
                            />
                        </div>

                        {{-- Detail Utama --}}
                        <div class="flex-grow">
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white leading-tight">
                                {{ $mhs->nama_mahasiswa }}
                            </h2>
                            <p class="text-sm font-mono mt-1 text-indigo-600 dark:text-indigo-400">{{ $mhs->nim }}</p>

                            {{-- Grup Detail Data --}}
                            <div class="mt-5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-4 text-sm">

                                {{-- Grup 1: Akademik --}}
                                <div>
                                    <p class="font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Akademik</p>
                                    <div class="space-y-1">
                                        <p><span class="font-semibold">Prodi:</span> {{ $mhs->program_studi }}</p>
                                        <p><span class="font-semibold">Kelas:</span> {{ $mhs->kelas }}</p>
                                        <p><span class="font-semibold">Angkatan:</span> {{ $mhs->angkatan }}</p>
                                    </div>
                                </div>

                                {{-- Grup 2: Kontak & Status --}}
                                <div>
                                    <p class="font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Info Dasar</p>
                                    <div class="space-y-1">
                                        <p><span class="font-semibold">Email:</span> {{ $mhs->email_akademik }}</p>
                                        <p><span class="font-semibold">Username:</span> {{ $mhs->username }}</p>
                                        <p><span class="font-semibold">Jalur USM:</span> {{ $mhs->jalur_usm }}</p>
                                    </div>
                                </div>
                                
                                {{-- Grup 3: Administrasi --}}
                                <div>
                                    <p class="font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Administrasi</p>
                                    <div class="space-y-1">
                                        <p><span class="font-semibold">Tgl Masuk:</span> {{ $mhs->tgl_masuk }}</p>
                                        <p><span class="font-semibold">Wali:</span> {{ $mhs->wali_mahasiswa }}</p>
                                        <p class="font-semibold">Status Akhir:
                                            <span class="inline-flex items-center rounded-full px-3 py-0.5 text-xs font-medium 
                                                @if($mhs->status_akhir === 'Aktif') bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100
                                                @elseif($mhs->status_akhir === 'Cuti') bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-100
                                                @else bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100
                                                @endif">
                                                {{ $mhs->status_akhir }}
                                            </span>
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            @endforeach

            {{-- Bagian @empty yang Diperbarui --}}
            @empty($mahasiswas)
                <div class="text-center p-16 bg-white dark:bg-gray-800 rounded-xl shadow-lg border-2 border-dashed border-gray-300 dark:border-gray-600">
                    <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                    </svg>
                    <h3 class="mt-2 text-xl font-semibold text-gray-900 dark:text-white">Data Kosong</h3>
                    <p class="mt-1 text-base text-gray-500 dark:text-gray-400">
                        Tidak ada data mahasiswa ditemukan. Harap isi data terlebih dahulu.
                    </p>
                    <div class="mt-6">
                        <p class="text-sm font-medium text-indigo-600 dark:text-indigo-400 mb-2">Jalankan seeder berikut:</p>
                        <code class="px-3 py-1 bg-gray-100 dark:bg-gray-700 rounded text-sm text-gray-700 dark:text-gray-200 select-all">
                            php artisan db:seed --class=MahasiswaSeeder
                        </code>
                    </div>
                </div>
            @endempty
        </div>
    </div>
</body>
</html>