@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('Tambahkan Kompetensi') }}
                    </div>
                    <div class="float-end">
                        <a href="{{route('atasan.index')}}" class="btn btn-sm btn-primary">
                            back
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('atasan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Kompetensi</label>
                            <input type="text" class="form-control @error('nama_kompetensi') is-invalid @enderror" name="nama_kompetensi"
                                value="{{ old('nama_kompetensi') }}" placeholder="nama_kompetensi" required>
                            @error('nama_kompetensi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>



                        <button type="submit" class="btn btn-sm btn-primary">Send</button>
                        <button type="reset" class="btn btn-sm btn-warning">Reset</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
