@extends('welcome')
@section('title')

@endsection
@section('content')
   <style>
       .card {
           border: 1px solid #ddd;
           border-radius: 10px;
           box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
           transition: box-shadow 0.3s ease;

       }
       .card-1 {
           background-image: url('{{ asset('cat.png') }}'); /* Kart 1 için arka plan resmi */
           background-size: cover;
           background-position: center;
           width: 100%; /* Kartın genişliği */
           height: 200px; /* Kartın yüksekliği */
           color: white;
           text-align: right; /* Metni sağa yaslar */
       }

       .card-2 {
           background-image: url('{{ asset('dog.png') }}'); /* Kart 2 için farklı arka plan resmi */
           background-size: cover;
           background-position: center;
           width: 100%; /* Kartın genişliği */
           height: 200px; /* Kartın yüksekliği */
           color: white;
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

       .btn-primary {
           background-color: #6c5ce7;
           border: none;
           padding: 10px 20px;
           font-size: 1rem;
           border-radius: 5px;
           transition: background-color 0.3s;
       }

       .btn-primary:hover {
           background-color: #5a4fe2;
       }
   </style>

   <div class="container mt-5">
       <h1 class="mb-4">Hayvan Irkları</h1>
       <div class="row">
           <!-- Kart 1: Köpek Irkları -->
           <div class="col-md-6 mb-4">
               <div class="card card-2" style="background-image: url('{{ asset('dog.png') }}'); background-size: cover;">
                   <div class="card-body text-white">
                       <h5 class="card-title">Köpek Irkları</h5>
                       <p class="card-text">

                       </p>
                       <a href="{{route('DogShow')}}" class="btn btn-light">Detayları Gör</a>
                   </div>
               </div>
           </div>

           <!-- Kart 2: Kedi Irkları -->
           <div class="col-md-6 mb-4">
               <div class="card card-1" style="background-image: url('{{ asset('cat.png') }}'); background-size: cover;">
                   <div class="card-body text-white">
                       <h5 class="card-title">Kedi Irkları</h5>
                       <p class="card-text"></p>
                       <a href="{{route('CatShow')}}" class="btn btn-light">Detayları Gör</a>
                   </div>
               </div>
           </div>
       </div>
   </div>

   <div class="container mt-5 ">
       <h1>Filtreleme</h1>

       <!-- Filtreleme Formu -->
       <form method="GET" action="{{ route('filter') }}">
           <div class="row">
               <!-- Irk -->
               <div class="col-md-3">
                   <select name="breed" class="form-select">
                       <option value="">Irk Seç</option>
                       @foreach($breeds as $breed)
                           <option value="{{ $breed->id }}" >
                               {{ $breed->name }}
                           </option>
                       @endforeach
                   </select>
               </div>

               <!-- Yaş -->
               <div class="col-md-3">
                   <select name="age_group" class="form-select">
                       <option value="">Yaş Seç</option>
                       @foreach(App\AgeGroup::all() as $age)
                           <option value="{{ $age }}">{{ $age }}</option>
                       @endforeach
                   </select>
               </div>

               <!-- Şehir -->
               <div class="col-md-3">
                   <select name="city" class="form-select">
                       <option value="">Şehir Seç</option>
                       @foreach($cities as $city)
                           <option value="{{ $city->id }}" >
                               {{ $city->name }}
                           </option>
                       @endforeach
                   </select>
               </div>

               <!-- Filtrele Butonu -->
               <div class="col-md-3">
                   <button type="submit" class="btn btn-primary">Filtrele</button>
               </div>
           </div>
       </form>
   </div>




       <!-- Addblockeri kapatmazsan resimler gelmiyor -->
   <div class="container mt-5">
       <h1 class="mb-4">İlanlar</h1>
       <div class="row">
           @foreach($ads as $ad)
               <div class="col-md-4 mb-4">
                   <div class="card">
                       <!-- Kalp butonu burda -->
                       <button class="btn btn-light position-absolute top-0 end-0 m-2 p-2 border-0 shadow" style="z-index: 1;"
                               onclick="addToFavorites({{ $ad->id }})">
                           <i class="bi bi-heart-fill text-danger"></i>
                       </button>

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

                           <!-- Devamını Oku Butonu -->
                           <a  href="{{ route('AdShow', $ad->id) }}"  class="btn btn-primary">Devamını Oku</a>
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
<script>
    function addToFavorites(adId) {
        fetch('/favorites/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ ad_id: adId })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Favorilere eklendi!');
                } else {
                    alert(data.message);
                }
            })
            .catch(error => console.error('Error:', error));
    }
</script>
