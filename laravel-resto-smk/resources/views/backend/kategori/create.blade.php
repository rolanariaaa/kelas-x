@extends('backend.layout')

@section('content')
<div class="container">
    <h1>Tambah Kategori</h1>
    <form action="{{ route('admin.kategori.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="kategori">Nama Kategori</label>
            <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Masukkan nama kategori">
            @error('kategori')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection