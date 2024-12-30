@extends('welcome')

@section('title')
    İlanlarım
@endsection

@section('content')
    <style>
        .card {
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;

        }



        .card:hover {
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-body {
            padding: 1.5rem;

        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .card-text {
            font-size: 1rem;
            color: #555;

        }

        .card .btn-light {
            border-radius: 50%;
            transition: background-color 0.3s;
        }

        .card .btn-light:hover {
            background-color: #f8d7da;
        }

        .btn {

            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
            transition: background-color 0.3s;
        }


    </style>

    <div class="container mt-5">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h1 class="mb-4">İlanlar</h1>
        <div class="row">
            @foreach($ads as $ad)
                <div class="col-md-4 mb-4">
                    <div class="card">


                        <!-- Resim kısmı bura -->
                        <img src="{{asset('Ad_images/' . $ad->image_url) }}" class="card-img-top" alt="{{ $ad->pet->name }}">

                        <!-- Tür adı kısmı burda -->
                        <div class="card-body">
                            <h5 class="card-title">{{ $ad->pet->name }}</h5>
                            <p class="card-text">
                                <strong>Tür:</strong> @if($ad->pet->breed && $ad->pet->breed->type)
                                    {{ $ad->pet->breed->type->name }}
                                @else
                                    Bilgi Yok
                                @endif <br>
                                <strong>Irk:</strong> {{ $ad->pet->breed->name }} <!-- Irk adı -->
                            </p>

                            <!-- Butonlar kısmı -->
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Detay Butonu -->
                                <a href="{{ route('AdShow', $ad->id) }}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <!-- Güncelle Butonu -->
                                <a href="{{ route('MyAdShow', $ad->id) }}" class="btn  btn-success btn-sm">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <!-- Sil Butonu -->
                                <form method="post" action="{{ route('Ad.destroy', $ad->id) }}" style="margin: 0;">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Bu ilanı silmek istediğinize emin misiniz?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>
            @endforeach
            {{-- Sayfalama bağlantılarını eklemek için --}}
            <div class="d-flex justify-content-center">
                {{ $ads->links() }}
            </div>

        </div>
    </div>

@endsection
