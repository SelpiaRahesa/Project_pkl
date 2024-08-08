@extends('layouts.admin')
@section('content')
<div class="container">
<div class="card">
    <div class="card-header">
        <div class="float-start">
            <h5> Tabel Mapel</h5>
        </div>
        <div class="float-end">
            <a href="{{route('mapel.create')}}" class="btn btn-sm btn-primary">
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
                        <th>Mapel</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @php $i=1; @endphp
                    @foreach ($mapel as $data )
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $data->mapel }}</td>
                        <td>
                            <form action="{{route('mapel.destroy', $data->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{route('mapel.edit', $data->id)}}" class="btn btn-sm btn-warning">
                                    Edit
                                </a>
                                {{-- <a href="{{ route('mapel.destroy', $data->id) }}" class="btn  btn-sm btn-danger" data-confirm-delete="true">Delete</a> --}}
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


