@extends('front')

@section('content')
<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ( $menus as $menu )
    <div class="col">
        <div class="card h-100">
            <div class="card-img-container" style="height: 200px; overflow: hidden;">
                <img src="{{ asset('gambar/'.$menu->gambar) }}" class="card-img-top" alt="{{ $menu->menu }}" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $menu->menu }}</h5>
                <p class="card-text">{{ $menu->deskripsi }}.</p>
                <h5 class="card-title text-primary">Rp. {{ number_format($menu->harga, 0, ',', '.') }}</h5>
                <a href="#" class="btn btn-primary">Beli</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="d-flex justify-content-center mt-5">
    {{ $menus->links()  }}
</div>
@endsection