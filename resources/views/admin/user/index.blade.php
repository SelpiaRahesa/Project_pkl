@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                <h5> Tabel User</h5>
            </div>
            <div class="float-end">
                <a href="{{route('user.create')}}" class="btn btn-sm btn-primary">
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @php $i=1; @endphp
                    @foreach ($user as $data )
                    @if($loop->first)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->isAdmin}}</td>
                        <td>
                    </tr>
                    @else
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->isAdmin}}</td>
                        <td>
                            <form action="{{route('user.destroy', $data->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{route('user.edit', $data->id)}}" class="btn btn-sm btn-warning">
                                    Edit
                                </a>
                                <button type="submit" class="btn  btn-sm btn-danger" onclick="return('Anda yakin ingin menghapusnya?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
<script>
    new DataTable('#example');
</script>
@endpush
