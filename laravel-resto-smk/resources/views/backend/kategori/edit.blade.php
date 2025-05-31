@extends('backend.layout')

@section('content')
<div class="container">
    <h1>Ubah Kategori</h1>
    <form action="{{ route('admin.kategori.update', $kategori->id_kategori) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="kategori">Nama Kategori</label>
            <input type="text" class="form-control" name="kategori" id="kategori" value="{{ $kategori->kategori }}">
            @error('kategori')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection