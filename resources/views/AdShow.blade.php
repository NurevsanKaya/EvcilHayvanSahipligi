@extends('welcome') <!-- Genel layout dosyanı kullan -->
@section('title')
   Detaylar
@endsection
@section('content')

    <div class="container mt-5">
        <div class="card p-4 shadow-lg">
            <!-- Title -->
            <h1 class="text-center mb-4">{{ $adshow->title }}</h1>

            <!-- Üst Bölüm: Görsel ve Bilgiler -->
            <div class="row">
                <!-- Fotoğraf Alanı -->
                <div class="col-md-5">
                    <img src="{{ asset('Ad_images/' . $adshow->image_url) }}" class="img-fluid rounded mb-4" alt="resim" >
                </div>

                <!-- Detay Bilgiler -->
                <div class="col-md-7">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>İsim:</strong> {{ $adshow->pet->name }}</li>
                        <li class="list-group-item"><strong>Şehir:</strong> {{ $adshow->address->district->city->name }}</li>
                        <li class="list-group-item"><strong>İlçe:</strong> {{ $adshow->address->district->name }}</li>
                        <li class="list-group-item"><strong>Yaş Grubu:</strong> {{ $adshow->pet->age }}</li>
                        <li class="list-group-item"><strong>Tür:</strong> {{ $adshow->pet->breed->type->name }}</li>
                        <li class="list-group-item"><strong>Irk:</strong> {{ $adshow->pet->breed->name }}</li>
                        <li class="list-group-item"><strong>Cinsiyet:</strong> {{ $adshow->pet->gender }}</li>
                        <li class="list-group-item"><strong>Aşı:</strong> {{ $adshow->pet->healthStatus->vaccination ? 'Evet' : 'Hayır' }}</li>
                        <li class="list-group-item"><strong>İç Parazit:</strong> {{ $adshow->pet->healthStatus->internal_parasite ? 'Evet' : 'Hayır' }}</li>
                        <li class="list-group-item"><strong>Dış Parazit:</strong> {{ $adshow->pet->healthStatus->external_parasite ? 'Evet' : 'Hayır' }}</li>
                    </ul>
                </div>
            </div>

            <!-- Açıklama ve İletişim -->
            <nav class="mt-4">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-desc" role="tab" aria-controls="nav-home" aria-selected="true">Açıklama</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">İletişim</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active mt-3" id="nav-desc" role="tabpanel" aria-labelledby="nav-home-tab">{{ $adshow->description }}</div>
                <div class="tab-pane fade mt-3" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="card">
                        <div class="card-header  text-black text-center">
                            Kullanıcı Bilgileri
                        </div>
                        <div class="card-body">
                            <p><strong>Ad:</strong> {{ $adshow->user->name }}</p>
                            <p><strong>Telefon:</strong> {{ $adshow->contact->phone_number }}</p>
                            <p><strong>Email:</strong>{{ $adshow->contact->email }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <br>
    <br>


@endsection
