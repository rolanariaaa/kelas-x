@extends('front')

@section('content')
<div class="row">
    <div class="col-6">
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="mt-2">
                <label class="form-label" for="">Nama</label>
                <input class="form-control" type="text" name="pelanggan" value="{{ old('pelanggan') }}">
                @error('pelanggan')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-2">
                <label class="form-label" for="">Alamat</label>
                <input class="form-control" type="text" name="alamat" value="{{ old('alamat') }}">
                @error('alamat')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-2">
                <label class="form-label" for="">Telp</label>
                <input class="form-control" type="text" name="telp" value="{{ old('telp') }}">
                @error('telp')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-2">
                <label class="form-label" for="">Jenis Kelamin</label>
                <select class="form-select" name="jeniskelamin">
                    <option value="L" {{ old('jeniskelamin') == 'L' ? 'selected' : '' }}>L</option>
                    <option value="P" {{ old('jeniskelamin') == 'P' ? 'selected' : '' }}>P</option>
                </select>
                @error('jeniskelamin')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-2">
                <label class="form-label" for="">Email</label>
                <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-2">
                <label class="form-label" for="">Password</label>
                <input class="form-control" type="password" name="password">
                @error('password')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-4">
                <button class="btn btn-primary" type="submit">Register</button>
            </div>
        </form>
    </div>
</div>
@endsection