@extends('welcome')
@section('title')
    İletişim
@endsection
@section('content')
    <div class="container">
        <h2 class="my-4">İletişim</h2>
        <p>Soru ve Şikayetleriniz İçin:</p>
        <ul>
            <li>Email: <a >ornek@domain.com</a></li>
            <li>Telefon: <a >+90 555 555 55 55</a></li>
        </ul>

        <hr>
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

        <form action="{{ route('contact.submit') }}" method="POST" class="p-4 border rounded shadow">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Ad Soyad</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="subject" class="form-label">Konu</label>
                <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject') }}" required>
                @error('subject')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="icerik" class="form-label">Mesajınız</label>
                <textarea class="form-control" id="icerik" name="icerik" rows="4" required>{{ old('icerik') }}</textarea>
                @error('icerik')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Gönder</button>


        </form>
        <br>
    </div>
@endsection
