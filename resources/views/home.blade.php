@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if(Auth::user()->isAdmin == "admin")
                        <p>Selamat datang, Admin!</p>
                        {{-- Tampilkan konten khusus untuk Admin --}}
                    @elseif(Auth::user()->isAdmin == "atasan")
                        <p>Selamat datang, Atasan!</p>
                        {{-- Tampilkan konten khusus untuk Atasan --}}
                    @elseif(Auth::user()->isAdmin == "guru")
                        <p>Selamat datang, Guru!</p>
                        {{-- Tampilkan konten khusus untuk Guru --}}
                    @elseif(Auth::user()->isAdmin == "siswa")
                        <p>Selamat datang, Siswa!</p>
                        {{-- Tampilkan konten khusus untuk Siswa --}}
                    @endif

                    {{-- Konten umum untuk semua pengguna --}}
                    <p>Ini adalah halaman dashboard Anda.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
