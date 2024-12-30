<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- jQuery (Bootstrap'ın JavaScript için gerekli) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Özel CSS -->
    <style>
        #content {
            font-family: Arial, Helvetica, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 0;
        }

        main {
            padding: 2em;
        }

        nav ul {
            list-style: none;
            padding: 0;
            display: flex;
        }

        nav ul li {
            margin: 0 1.5em;
        }

        footer {
            background-color: #b5efff ;
            text-align: center;
        }

        /* Navbar için */
        .bg-custom {
            background-color: #b5efff;
        }

        .btn-custom {
            background-color: #a0e0ff;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #8acbff;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
            transform: translateY(-4px);
        }

        .btn-instagram {
            background: linear-gradient(45deg, #f58529, #dd2a7b, #8134af); /* Instagram renk geçişi */
            display: inline-block; /* Buton hizalama */
            transition: transform 0.3s ease; /* Hover animasyonu */
        }

        .btn-instagram:hover {
            transform: scale(1.1); /* Hover sırasında buton büyür */
        }

        .btn-instagram img {
            width: 32px; /* İkon boyutu */
            height: 32px; /* İkon boyutu */
            transition: transform 0.2s ease; /* Hover animasyonu */
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="{{asset('navbarLogo.png')}}" alt="Logo" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Sol Menü -->
            <ul class="navbar-nav me-auto mb-0 mb-lg-0 d-flex justify-content-start">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Ana Sayfa</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sevimli Dostlarımız
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('CatShow')}}">Kedi</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('DogShow')}}">Köpek</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/About">Hakkımızda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Contact">İletişim</a>
                </li>
            </ul>

            <!-- Sağ Menü -->
            <ul class="navbar-nav ms-auto d-flex justify-content-end">
                <li class="nav-item">
                    @if(Auth::check())
                    <a class="btn btn-custom" href="{{ route('ad') }}">İlan Ver</a>

                    @else
                        <a class="btn btn-custom" href="{{ route('login') }}">İlan Ver</a>
                    @endif
                </li>


                <li class="nav-item dropdown">
                    @if(Auth::check())
                        <a class="btn btn-custom dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="{{route('myAds')}}">İlanlarım</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Çıkış Yap</a></li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a class="btn btn-custom" href="{{ route('login') }}">
                            <img src="{{asset('user.png')}}" alt="user" height="25"> Giriş
                        </a>
                    @endif
                </li>

                <li class="nav-item">
                    <a  class="btn btn-custom me-2" href="{{route('favorites')}}">Favorilerim <img src="{{asset('heart.png')}}" alt="heart" height="25"></a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<div id="content">
    @yield('content')
</div>

<footer class=" text-center text-lg-start text-black">
    <div class=" p-4">
        <div class="row my-4">
            <!-- Sosyal Medya -->
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                <h6 class="text-uppercase mb-4 font-weight-bold">Bizi Takip Edin!</h6>
                <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="#" role="button">
                    <img src="{{asset('facebook.png')}}" alt="Facebook" style="width: 32px; height: 32px;">
                </a>
                <a class="btn btn-primary btn-floating m-1" style="background-color: #000102" href="#" role="button">
                    <img src="{{asset('twitter.png')}}" alt="Twitter" style="width: 32px; height: 32px;">
                </a>

                <a class="btn btn-primary btn-floating m-1 btn-instagram"  href="#" role="button">
                    <img src="{{asset('instagram.png')}}" alt="Instagram" style="width: 32px; height: 32px;">
                </a>
            </div>

            <!-- Logo ve Açıklama -->
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0 text-center">
                <img class="rounded-circle bg-white shadow-1-strong mb-4" style="width: 160px; height: 160px;" src="{{asset('PATİKO.png')}}" alt="Logo">
                <p>Evcil Hayvan Sahiplendirme platformu Petiko, yavru evcil hayvan cinsleri ve diğer tüm sahiplendirme ilanları ile yayında!</p>
            </div>

            <!-- İletişim Bilgileri -->
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0 text-center">
                <h5 class="text-uppercase mb-4">Bize ulaşın!</h5>
                <ul class="list-unstyled">
                    <li><p><i class="bi bi-geo-alt"></i> Warsaw, 57 Street, Poland</p></li>
                    <li><p><i class="bi bi-telephone"></i> +01 234 567 89</p></li>
                    <li><p><i class="bi bi-envelope"></i> contact@example.com</p></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        © 2024 Copyright:
        <a class="text-white" href="/">Petiko.com</a>
    </div>
</footer>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
