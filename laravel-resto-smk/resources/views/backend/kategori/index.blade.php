@extends('backend.layout')

@section('content')
<div class="container">
    <h1>Daftar Kategori</h1>
    <a href="{{ route('admin.kategori.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Ubah</th>
                <th>Hapus</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $key => $kategori)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $kategori->kategori }}</td>
                <td><a href="{{ route('admin.kategori.edit', $kategori->id_kategori) }}" class="btn btn-warning">Ubah</a></td>
                <td>
                    <form action="{{ route('admin.kategori.destroy', $kategori->id_kategori) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection