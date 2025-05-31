@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Menu List</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menus as $menu)
            <tr>
                <td>{{ $menu->menu }}</td>
                <td>{{ $menu->kategori }}</td>
                <td>{{ $menu->harga }}</td>
                <td>{{ $menu->deskripsi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $menus->links() }}
    </div>
</div>
@endsection