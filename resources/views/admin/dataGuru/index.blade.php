@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('Data Guru SMK ASSALAAM BANDUNG') }}
                    </div>
                    <div class="float-end">
                        <a href="{{route('dataGuru.create')}}" class="btn btn-sm btn-primary">
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
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>NIP</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Image</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @forelse ($dataGuru as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->jenis_kelamin}}</td>
                                    <td>{{ $data->nip}}</td>
                                    <td>
                                        @if($data->mapel)
                                            {{$data->mapel->mapel}}
                                        @else
                                            kategori tidak ditemukan
                                        @endif
                                    </td>
                                    <td>
                                        <img src="{{ asset('/storage/data_gurus/' . $data->image) }}" class="rounded"
                                            style="width: 150px">
                                    </td>
                                    <td>
                                        <form action="{{route('dataGuru.destroy', $data->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('dataGuru.edit', $data->id)}}" class="btn btn-sm btn-warning">
                                                Edit
                                            </a>
                                            {{-- <a href="{{ route('dataGuru.destroy', $data->id) }}" class="btn  btn-sm btn-danger" data-confirm-delete="true">Delete</a> --}}
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
