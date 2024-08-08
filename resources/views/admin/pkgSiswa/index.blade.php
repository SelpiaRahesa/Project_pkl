@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('Penilaian Kinerja Guru Untuk Siswa') }}
                    </div>
                    <div class="float-end">
                        <a href="{{route('pkgSiswa.create')}}" class="btn btn-sm btn-primary">
                            Add
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Kompetensi</th>
                                    <th>pertanyaan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @forelse ($pkgSiswa as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        @if($data->siswa)
                                            {{$data->siswa->nama_kompetensi}}
                                        @else
                                            Data tidak ditemukan
                                        @endif
                                    </td>
                                    <td>{{ $data->pertanyaan }}</td>
                                    <td>
                                        <form action="{{route('pkgSiswa.destroy', $data->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('pkgSiswa.edit', $data->id)}}" class="btn btn-sm btn-warning">
                                                Edit
                                            </a>
                                            {{-- <a href="{{ route('pkgSiswa.destroy', $data->id) }}" class="btn  btn-sm btn-danger" data-confirm-delete="true">Delete</a> --}}
                                            <button type="submit" onsubmit="return confirm('Are You Sure ?');" class="btn  btn-sm btn-danger" data-confirm-delete="true">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        Data data belum Tersedia.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{-- {!! $dataGuru->withQueryString()->links('pagination::bootstrap-4') !!} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
