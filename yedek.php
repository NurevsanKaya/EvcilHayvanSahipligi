<form action="" method="post" class="p-4 border rounded shadow">
    @csrf
    <br>
    <h3 class="mb-4">İlan Detayları</h3>
    <br>
    <div class="form-group">
        <label for="photos">Resimler</label>
        <input type="file" id="photos" name="photos[]" accept="image/*" multiple>
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Ad</label>
        <input name="name" id="name" class="form-control" value="{{ old('name') }}" type="text" >
        @error('name')
        <div class="alert alert-danger mt-2 py-2 px-3">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="surname" class="form-label">Soyad</label>
        <input name="surname" id="surname" class="form-control" value="{{ old('surname') }}" type="text" >
        @error('surname')
        <div class="alert alert-danger mt-2 py-2 px-3">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="birthdate" class="form-label">Doğum Tarihi</label>
        <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ old('birthdate') }}" >
        @error('birthdate')
        <div class="alert alert-danger mt-2 py-2 px-3">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Cinsiyet</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender1" value="erkek">
            <label class="form-check-label" for="gender1">ERKEK</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender2" value="kadin" checked>
            <label class="form-check-label" for="gender2">KADIN</label>
        </div>
    </div>

    <div class="mb-3">
        <label for="address" class="form-label">Adres</label>
        <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
        @error('address')
        <div class="alert alert-danger mt-2 py-2 px-3">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Telefon Numarası</label>
        <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
        @error('phone')
        <div class="alert alert-danger mt-2 py-2 px-3">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">E-posta Adresi</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
        @error('email')
        <div class="alert alert-danger mt-2 py-2 px-3">{{ $message }}</div>
        @enderror
    </div>



    <div class="mb-3">
        <label for="education" class="form-label">Eğitim Bilgileri</label>
        <textarea class="form-control" id="education" name="education" rows="3">{{ old('education') }}</textarea>
        @error('education')
        <div class="alert alert-danger mt-2 py-2 px-3">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="experience" class="form-label">İş Deneyimi</label>
        <textarea class="form-control" id="experience" name="experience" rows="3">{{ old('experience') }}</textarea>
        @error('experience')
        <div class="alert alert-danger mt-2 py-2 px-3">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="skills" class="form-label">Yetenekler ve Yeterlilikler</label>
        <textarea class="form-control" id="skills" name="skills" rows="3">{{ old('skills') }}</textarea>
        @error('skills')
        <div class="alert alert-danger mt-2 py-2 px-3">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="referencess" class="form-label">Referanslar</label>
        <textarea class="form-control" id="referencess" name="referencess" rows="3">{{ old('referencess') }}</textarea>
        @error('referencess')
        <div class="alert alert-danger mt-2 py-2 px-3">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="position" class="form-label">Başvurduğunuz Pozisyon</label>
        <input type="text" class="form-control" id="position" name="position" value="{{ old('position') }}">
        @error('position')
        <div class="alert alert-danger mt-2 py-2 px-3">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="additional_info" class="form-label">Ekstra Bilgiler</label>
        <textarea class="form-control" id="additional_info" name="additional_info" rows="3">{{ old('additional_info') }}</textarea>

    </div>

    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="consent" name="consent" value="1">
        <label class="form-check-label" for="consent">Bilgilerin doğru olduğunu onaylıyorum.</label>
    </div>

    <button type="submit" class="btn btn-primary">Gönder</button>
</form>




<!DOCTYPE html>

<html lang="tr">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script><!--TinyMCE-->

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- id ye css verdiğim için # işareti kullandım -->
    <style type="text/css">
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
            background-color: #b5efff;
            text-align: center;
        }
        /*navbar için*/
        .bg-custom {
            background-color: #b5efff; /* Navbar arka plan rengi */
        }

        .btn-custom {
            background-color: #a0e0ff; /* Buton rengi, navbar'a yakın bir ton */
            border: none; /* Kenarlıkları kaldırıyoruz */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); /* Gölgeleme efekti */
            transition: all 0.3s ease; /* Yumuşak geçiş efekti */
        }

        .btn-custom:hover {
            background-color: #8acbff; /* Hover durumunda biraz daha koyu bir renk */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3); /* Hover durumunda gölgeyi biraz daha artırıyoruz */
            transform: translateY(-4px); /* "Uçuyormuş" efekti, buton yukarı doğru kayar */
        }




    </style>

</head>
<body>

<nav class="navbar navbar-expand-lg bg-custom">
    <div class="container-fluid">
        <!-- Logo ve Sol Menü -->
        <a class="navbar-brand" href="/">
            <img src="navbarLogo.png" alt="Logo" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Sol menü kısmı (Ana Sayfa, Sevimli Dostlarımız) -->
            <ul class="navbar-nav me-auto mb-0 mb-lg-0 d-flex justify-content-start">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Ana Sayfa</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sevimli Dostlarımız
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Kedi</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Köpek</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav me-auto d-flex justify-content-start">
                <li class="nav-item">
                    <a class="nav-link" href="/About">Hakkımızda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/">İletişim</a>
                </li>
            </ul>

            <!-- Sağ buton kısmı (İlan Ver, Favorilerim, Giriş) -->
            <ul class="navbar-nav ms-auto d-flex justify-content-end">
                <li class="nav-item">
                    <a class="btn btn-custom" href="{{ route('ad') }}">İlan Ver</a>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-custom me-2">Favorilerim <img src="heart.png" alt="heart" height="25"></button>
                </li>
                <li class="nav-item">
                    <a class="btn btn-custom" href="{{ route('login') }}"><img src="user.png" alt="user" height="25"> Giriş</a>
                </li>
            </ul>
        </div>
    </div>
</nav>




<div id="content">
    @yield('content')
</div>




<footer class="bg-primary text-center text-lg-start text-white">
    <!-- Grid container -->
    <div class="container p-4">
        <!--Grid row-->
        <div class="row my-4">
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">

                <h6 class="text-uppercase mb-4 font-weight-bold">Bizi Takip Edin!</h6>

                <!-- Facebook -->
                <a
                    class="btn btn-primary btn-floating m-1"
                    style="background-color: #3b5998"
                    href="#"
                    role="button"
                ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                    </svg>
                </a>

                <!-- Twitter -->
                <a
                    class="btn btn-primary btn-floating m-1"
                    style="background-color: #55acee"
                    href="#"
                    role="button"
                ><i class="fab fa-twitter"></i
                    ></a>

                <!-- Google -->
                <a
                    class="btn btn-primary btn-floating m-1"
                    style="background-color: #dd4b39"
                    href="#"
                    role="button"
                ><i class="fab fa-google"></i
                    ></a>

                <!-- Instagram -->
                <a
                    class="btn btn-primary btn-floating m-1"
                    style="background-color: #ac2bac"
                    href="#"
                    role="button"
                ><i class="fab fa-instagram"></i
                    ></a>
            </div>

            <!--Grid column-->
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">

                <div >
                    <img class="rounded-circle bg-white shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto" style="width: 160px; height: 160px;" src="PATİKO.png" alt="Logo" >
                </div>

                <p class="text-center">
                    Evcil Hayvan Sahiplendirme platformu Petiko, yavru evcil hayvan cinsleri ve diğer tüm sahiplendirme ilanları ile yayında!
                </p>

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0 text-center">
                <h5 class="text-uppercase mb-4">Bize ulaşın!</h5>

                <ul class="list-unstyled">
                    <li>
                        <p><i class="fas fa-map-marker-alt pe-2"></i>Warsaw, 57 Street, Poland</p>
                    </li>
                    <li>
                        <p><i class="fas fa-phone pe-2"></i>+ 01 234 567 89</p>
                    </li>
                    <li>
                        <p><i class="fas fa-envelope pe-2 mb-0"></i>contact@example.com</p>
                    </li>
                </ul>
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        © 2024 Copyright:
        <a class="text-white" href="/">Petiko.com</a>
    </div>
    <!-- Copyright -->
</footer>



</body>
</html>
