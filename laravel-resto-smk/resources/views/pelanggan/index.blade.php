@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Pelanggan</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pelanggans as $index => $pelanggan)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $pelanggan->email }}</td>
                <td>{{ $pelanggan->telp }}</td>
                <td>{{ $pelanggan->alamat }}</td>
                <td>{{ $pelanggan->status ? 'Aktif' : 'Banned' }}</td>
                <td>
                    <form action="{{ route('pelanggan.updateStatus', $pelanggan->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="{{ $pelanggan->status ? 0 : 1 }}">
                        <button type="submit" class="btn btn-sm {{ $pelanggan->status ? 'btn-danger' : 'btn-success' }}">
                            {{ $pelanggan->status ? 'Ban' : 'Aktifkan' }}
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $pelanggans->links() }}
    </div>
</div>
@endsection