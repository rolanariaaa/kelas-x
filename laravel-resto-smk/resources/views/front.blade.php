<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Restoran SMK</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>

<body>
    <div class="container">
        <div class="mt-2">
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                    <a href="/"><img style="width: 300px;" src="{{ asset('gambar/logo.jpg') }}" alt=""></a>
                    <ul class="navbar-nav gap-5">
                        <li class="nav-item">Cart</li>
                        @if(session('IDpelanggan'))
                        <li class="nav-item"><a href="{{ url('register') }}">Register</a></li>
                        <li class="nav-item">{{ session('email') }}</li>
                        <li class="nav-item"><a href="{{ url('logout') }}">Logout</a></li>
                        @else
                        <li class="nav-item"><a href="{{ url('register') }}">Register</a></li>
                        <li class="nav-item"><a href="{{ url('login') }}">Login</a></li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
        <div class="row mt-4">
            <div class="col-2">
                <ul class="list-group">
                    @php
                    $showStaticGorenganEnak = true;
                    @endphp
                    @foreach ($kategoris as $kategori)
                    @if ($kategori->kategori == 'Gorengan Enak')
                    <li class="list-group-item"><a href="{{ url('show/'.$kategori->idkategori) }}"> Gorengan Enak </a></li>
                    @php $showStaticGorenganEnak = false; @endphp
                    @else
                    <li class="list-group-item"><a href="{{ url('show/'.$kategori->idkategori) }}"> {{$kategori->kategori}} </a></li>
                    @if ($kategori->kategori == 'Gorengan Enak') {{-- If "Gorengan Enak" is already a dynamic category --}}
                    @php $showStaticGorenganEnak = false; @endphp
                    @endif
                    @endif
                    @endforeach
                    @if ($showStaticGorenganEnak)
                    <li class="list-group-item"><a href="#">Gorengan Enak</a></li>
                    @endif
                    <li class="list-group-item"><a href="#">Buah Manis</a></li>
                </ul>

            </div>
            <div class="col-8">
                @yield('content')
            </div>
        </div>
        <div>
            footer
        </div>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>