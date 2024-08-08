@extends('layouts.admin')
@section('content')
<div class="container">
<div class="card">
    <div class="card-header">
        <div class="float-start">
            <h5> Tabel Kompetensi Guru</h5>
        </div>
        <div class="float-end">
            <a href="{{route('guru.create')}}" class="btn btn-sm btn-primary">
                Add
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table" id="example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kompetensi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @php $i=1; @endphp
                    @foreach ($guru as $data )
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $data->nama_kompetensi }}</td>
                        <td>
                            <form action="{{route('guru.destroy', $data->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{route('guru.edit', $data->id)}}" class="btn btn-sm btn-warning">
                                    Edit
                                </a>
                                {{-- <a href="{{ route('guru.destroy', $data->id) }}" class="btn  btn-sm btn-danger" data-confirm-delete="true">Delete</a> --}}
                                <button type="submit" onsubmit="return confirm('Are You Sure ?');" class="btn  btn-sm btn-danger" data-confirm-delete="true">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection


