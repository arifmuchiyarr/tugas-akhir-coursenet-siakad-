<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sistem Informasi Universitas Ilmu Komputer</title>
    <link rel="icon" href="{{ asset('img/favicon.png') }} " type="image/png">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<!-- NAVBAR -->
<nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top" >
    <div class="container pb-3">
        <a class="navbar-brand" href="/">Ilmu Komputer</a>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav m-auto">
                <li class="nav-item "><a class="nav-link px-4" href="/jurusan">Jurusan</a></li>
                <li class="nav-item"><a class="nav-link px-4" href="/dosen">Dosen</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link px-4" href="/mahasiswa" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Mahasiswa
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/mahasiswa">Data Mahasiswa</a>
                        <a class="dropdown-item" href="/tugasakhir">Data Tugas Akhir</a>
                    </div>
                    {{-- <a class="nav-link px-4" href="/mahasiswa">Mahasiswa</a></li> --}}
                <li class="nav-item"><a class="nav-link px-4" href="/matakuliah">MataKuliah</a></li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link px-4" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="nav-link px-4">Register</a>
                </li>
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle px-4" href="#" role="button" data-toggle="dropdown" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item px-4" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-3" style="min-height:550px; padding-top: 3rem;>
    <div class="row">
        <div class="col-12">
            @yield('content')
        </div>
    </div>
</div>
<!-- FOOTER -->
<footer id="main-footer" class="text-white bg-dark py-4 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3 text-center text-md-left">
                <a href="{{ url('/') }}">Ilmu Komputer</a>
                <p>Lorem ipsum dolor sit amet veniam consectetur adipisicing elit.Aperiam cumque, esse modi maxime.</p>
            </div>
            <div class="col-md-3 text-center d-none d-md-inline">
                <h5>Information</h5>
                <ul class="list-unstyled">
                    <li><a href="/jurusan" class="text-white">Jurusan</a></li>
                    <li><a href="/index" class="text-white">Dosen</a></li>
                    <li><a href="/mahasiswa" class="text-white">Mahasiswa</a></li>
                    <li><a href="/matakuliah" class="text-white">Mata Kuliah</a></li>
                </ul>
            </div>
            <div class="col-md-3 text-center">
                <h5>Our Services</h5>
                <ul class="list-unstyled">
                    @guest
                    @if (Route::has('register'))
                    <li><a class="text-white" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @endif
                    @endguest
                    <li><a href="#" class="text-white">Help/Contact Us</a></li>
                    <li><a href="#" class="text-white">Privacy Policy</a></li>
                    <li><a href="#" class="text-white">Terms & Conditions</a></li>
                </ul>
            </div>
            <div class="col-md-3 text-center text-md-left">
                <h5>Hubungi Kami</h5>
                <div class="text-nowrap"><i class="fas fa-envelope fa-fw mr-3"></i>info@ilmukomputer.ac.id</div>
                <div class="text-nowrap"><i class="fas fa-phone fa-fw mr-3"></i>(021) 123456</div>
                <div class="text-nowrap"><i class="fas fa-globe fa-fw mr-3"></i>www.ilmukomputer.ac.id</div>
            </div>
        </div>
        <div class="row mt-3 mt-md-0">
            <div class="col-md-3 mr-md-auto text-center text-md-left">
                <small>&copy; Ilmukomputer {{date("Y")}}</small>
            </div>
            <div id="footer-icon" class="col-md-3 text-center text-md-left">
                <div>
                    <a href="#" class="text-white mr-1"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="#" class="text-white mr-1"><i class="fab fa-twitter fa-lg"></i></a>
                    <a href="#" class="text-white mr-1"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="#" class="text-white mr-1"><i class="fab fa-google-plus fa-lg"></i></a>
                    <a href="#" class="text-white mr-1"><i class="fab fa-github fa-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
