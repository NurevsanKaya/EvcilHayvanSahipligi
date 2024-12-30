@extends('welcome')
@section('title')
    Favorilerim
@endsection
@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Favori İlanlarınız</h1>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <!-- Favori ilanlar var mı kontrolü -->
        @if($favorites->isEmpty())
            <p>Favori ilanınız bulunmamaktadır.</p>
        @else
            <div class="row">
                @foreach($favorites as $favorite)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <!-- Resim -->
                            <img src="{{asset('Ad_images/' . $favorite->ad->image_url) }}" class="card-img-top" alt="{{ $favorite->ad->pet->name }}">

                            <div class="card-body">
                                <h5 class="card-title">{{ $favorite->ad->pet->name }}</h5>
                                <p class="card-text">
                                    <strong>Tür:</strong> @if($favorite->ad->pet->breed && $favorite->ad->pet->breed->type)
                                        {{ $favorite->ad->pet->breed->type->name }}
                                    @else
                                        Bilgi Yok
                                    @endif <br> <!-- Tür adı -->
                                    <strong>Irk:</strong> {{ $favorite->ad->pet->breed->name }} <!-- Irk adı -->
                                </p>

                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{ route('AdShow', $favorite->ad_id) }}" class="btn btn-primary">Devamını Oku</a>
                                    <form method="post" action="{{ route('favorites.destroy', $favorite->id) }}" style="margin: 0;">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">Kaldır</button>
                                    </form>
                                </div>





                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

<style>
    .card {
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }



    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
    }

    .card-text {
        font-size: 1rem;
        color: #555;
    }

    .btn-primary {
        background-color: #0056b3;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .container {
        max-width: 1200px;
    }

    .card-img-top {
        height: 250px;
        object-fit: cover;
    }
</style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                let alerts = document.querySelectorAll('.alert');//classı alert olanları seçiyoz
                alerts.forEach(function (alert) {
                    alert.classList.add('fade');
                    setTimeout(() => alert.remove(), 500); // Fade out sonrası tamamen kaldır
                });
            }, 3000); // 3 saniye sonra mesajları gizle
        });
    </script>

@endsection
