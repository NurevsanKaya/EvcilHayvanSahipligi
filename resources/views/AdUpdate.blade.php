@extends('welcome')
@section('title')
    Güncelleme
@endsection

@section('content')
    <br>
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
    <form action="{{ route('AdUpdate' ,$ads->id) }}" method="POST" class="p-4 border rounded shadow mb-5" enctype="multipart/form-data">
        @csrf
        @method('put')
        <br>
        <h3 class="mb-4">İlan Detayları</h3>



        <div class="mb-3">
            <label for="name" class="form-label">Ad</label>
            <input name="name" id="name" class="form-control" value="{{  $ads->pet->name ?? 'gelmedi' }}" type="text" >
            @error('name')
            <div class="alert alert-danger mt-2 py-2 px-3">{{ $message }}</div>
            @enderror
        </div>

        <!-- === denklik demek. hem değerlerine bakar hemde veri tiplerine. // == sadece değerine bakar   -->
        <div class="form-group ">
            <label for="pet_type_id">Türler:</label>
            <select name ="pet_type_id" id="pet_type_id" class="form-control">
                <option  selected>Seçiniz...</option>
                @foreach($petTypes as $petType)
                    <option value="{{$petType-> id}}" {{ $ads->pet->breed->type->id === $petType->id ? 'selected' : '' }}> {{$petType->name}}</option>
                @endforeach
            </select>
        </div>
        <br>

        <div class="form-group ">
            <label for="pet_breed_id">Irklar:</label>
            <select name ="pet_breed_id" id="pet_breed_id" class="form-control"  >
                <option selected  value="{{$ads->pet->breed->id}}">{{$ads->pet->breed->name}}</option>

            </select>
        </div>
        <br>
        <div class="mb-3">
            <label for="title" class="form-label">İlan Başlığı</label>
            <input name="title" id="title" class="form-control" value="{{  $ads->title ?? 'gelmedi' }}" type="text" >
            <!-- name="Title" ile sunucuya gönderilen verinin adını tanımlıyoruz -->
            @error('title')
            <div class="alert alert-danger mt-2 py-2 px-3">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Açıklama </label>
            <textarea name="description" class="form-control"  id="exampleFormControlTextarea1" rows="3"> {{  $ads->description ?? 'gelmedi' }}</textarea>
        </div>
        <br>
        <div class="form-group">
            <select name="age_group" class="form-select">
                @foreach(App\AgeGroup::all() as $age)
                    <option value="{{ $age }}" {{ $ads->pet->age === $age ? 'selected' : '' }}>{{ $age }}</option>
                @endforeach
            </select>
        </div>
        <br>

        <div class="form-group">
            <label for="genderr">Cinsiyet:</label>
            <div>
                <input type="radio" name="genderr" value="Erkek" {{ $ads->pet->gender === 'Erkek' ? 'checked' : '' }}> Erkek
                <input type="radio" name="genderr" value="Dişi" {{ $ads->pet->gender === 'Dişi' ? 'checked' : '' }}> Dişi
            </div>
        </div>
        <br>
        <div class="form-group">
            <label for="vaccination">Aşı Durumu:</label>
            <div>
                <input type="radio" name="vaccination" value="1" {{ $ads->pet->healthStatus->vaccination == 1 ? 'checked' : '' }}> Evet
                <input type="radio" name="vaccination" value="0" {{  $ads->pet->healthStatus->vaccination == 0 ? 'checked' : '' }}> Hayır
            </div>
        </div>
        <br>
        <div class="form-group">
            <label for="internal_parasite">İç Parazit Tedavisi:</label>
            <div>
                <input type="radio" name="internal_parasite" value="1" {{ $ads->pet->healthStatus->internal_parasite == '1' ? 'checked' : '' }}> Evet
                <input type="radio" name="internal_parasite" value="0" {{ $ads->pet->healthStatus->internal_parasite == '0' ? 'checked' : '' }}> Hayır
            </div>
        </div>
        <br>
        <div class="form-group">
            <label for="external_parasite">Dış Parazit Tedavisi:</label>
            <div>
                <input type="radio" name="external_parasite" value="1" {{ $ads->pet->healthStatus->external_parasite == '1' ? 'checked' : '' }}> Evet
                <input type="radio" name="external_parasite" value="0" {{ $ads->pet->healthStatus->external_parasite == '0' ? 'checked' : '' }}> Hayır
            </div>
        </div>
        <br>
        <div class="form-group">
            <label for="health_description">Sağlık Açıklaması:</label>
            <textarea name="health_description" id="health_description" class="form-control">{{  $ads->pet->healthStatus->health_description ?? 'gelmedi' }}</textarea>
            @error('health_description')
            <div class="alert alert-danger mt-2 py-2 px-3">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group">
            <label for="city_id">Şehir</label>
            <select name="city_id" id="city_id" class="form-control">
                <option value="">Şehir Seçin</option>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}" {{$ads->address->district->city->id ===  $city->id ? 'selected' : ''}}>{{ $city->name }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <!-- İlçe Seçimi -->
        <div class="form-group">
            <label for="district_id">İlçe</label>
            <select name="district_id" id="district_id" class="form-control">
                <option value="{{ $ads->address->district->id }}">{{ $ads->address->district->name }}</option>

            </select>
        </div>
        <br>

        <!-- posta kodu Alanı -->
        <div class="mb-3">
            <label for="postal_code" class="form-label">Posta kodunu giriniz</label>
            <input name="postal_code" id="postal_code" class="form-control" value="{{ $ads->address->postal_code ?? 'gelmedi' }}" type="text" >

        </div>
        <br>



        <!-- Telefon Numarası -->
        <div class="form-group">
            <label for="phone_number">Telefon Numarası</label>
            <input
                type="text"
                class="form-control"
                id="phone_number"
                name="phone_number"
                title="Telefon numarası 11 rakamdan oluşmalıdır."
                value="{{ $ads->contact->phone_number ?? 'gelmedi' }}"
            >
        </div>
        <br>
        <!-- E-posta -->
        <div class="form-group">
            <label for="email">E-posta</label>
            <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                maxlength="255"
                value="{{ $ads->contact->email ?? 'gelmedi' }}"
            >
        </div>
        <br>
        <div class="mb-3">
            <label for="images" class="form-label">Yeni Resimleri Yükle</label>
            <input type="file" class="form-control" name="images[]" id="images" multiple>
        </div>

        <button type="submit" class="btn btn-primary">Düzenle</button>


    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Pet türü değiştiğinde irkları yükle
        $('#pet_type_id').on('change', function() {
            var pet_type_id = $(this).val();

            // Eğer bir tür seçilmişse
            if (pet_type_id) {
                $.ajax({
                    url: '/pet-breeds/' + pet_type_id,  // Controller'daki rota
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#pet_breed_id').empty();  // Irkları temizle

                        // Yeni irkları ekle
                        $('#pet_breed_id').append('<option selected>Seçiniz...</option>');
                        $.each(data, function(key, breed) {
                            $('#pet_breed_id').append('<option value="' + breed.id + '">' + breed.name + '</option>');
                        });
                    }
                });
            } else {
                $('#pet_breed_id').empty().append('<option selected>Seçiniz...</option>');  // Eğer tür seçilmediyse, irkları temizle
            }
        });
    </script>
    <script>
        // Pet türü değiştiğinde irkları yükle
        $('#city_id').on('change', function() {
            var city_id = $(this).val();

            // Eğer bir tür seçilmişse
            if (city_id) {
                $.ajax({
                    url: '/district/' +  city_id,  // Controller'daki rota
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#district_id').empty();  // ilçeleri temizle

                        // Yeni irkları ekle
                        $('#district_id').append('<option selected>Seçiniz...</option>');
                        $.each(data, function(key, district) {
                            $('#district_id').append('<option value="' + district.id + '">' + district.name + '</option>');
                        });
                    }
                });
            } else {
                $('#district_id').empty().append('<option selected>Seçiniz...</option>');  // Eğer il seçilmediyse, ilçeleri temizle
            }
        });
    </script>
@endsection
