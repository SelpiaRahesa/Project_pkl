@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('Tambahkan Pertanyaan') }}
                    </div>
                    <div class="float-end">
                        <a href="{{route('pkgSiswa.index')}}" class="btn btn-sm btn-primary">
                            Back
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('pkgSiswa.update', $pkgSiswa->id) }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Kompetensi</label>
                            <select name="id_kompetensi" class="form-select">
                                <option value=""disabled selected>Pilih Kompetensi</option>
                                @forelse($siswa as $data)

                                <option value="{{$data->id}}" @error('id_kompetensi') is-invalid @enderror>
                                    {{$data->nama_kompetensi}}
                                </option>
                                @empty
                                <option value="" disabled>Data Belum Tersedia</option>
                                @enderror
                            </select>
                            @error('id_kompetensi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pertanyaan</label>
                            <input type="text" class="form-control"  @error('pkgSiswa') is-invalid @enderror"
                                name="pertanyaan" value="{{ old('pkgSiswa', $pkgSiswa->pertanyaan) }}" rows="3" placeholder="Masukan Pertanyaan"
                                required>
                            @error('pkgSiswa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </required>
                        </div>
                        <div>
                        <button type="submit" class="btn btn-sm btn-primary">Send</button>
                        <button type="reset" class="btn btn-sm btn-warning">Reset</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
