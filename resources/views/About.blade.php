@extends('welcome')
@section('title')
    Hakkımızda
@endsection
@section('content')



        <style>
            .about-section {
                background-color: #f9f9f9;
                padding: 50px 20px;
                text-align: center;
            }
            .about-title {
                font-size: 2.5rem;
                color: #3e4143;
                margin-bottom: 20px;
            }
            .about-content {
                font-size: 1.1rem;
                color: rgba(81, 85, 96, 0.82);
                line-height: 1.8;
            }
            .about-content span {
                font-weight: bold;
                color: #007bff;
            }
        </style>

    <section class="about-section">
        <div class="container">
            <h2 class="about-title">Hakkımızda</h2>
            <p class="about-content">
                Merhaba, biz <span>Petiko</span>!
                Evcil hayvanlarla dolu bir dünya yaratmayı ve onların daha iyi bir yaşam sürmesine katkı sağlamayı hedefleyen bir platformuz.
                Sahipsiz hayvanların sıcak bir yuva bulmasını kolaylaştırmak, hayvan sahiplerini bilinçlendirmek ve evcil hayvanların yaşam kalitesini artıracak çözümler sunmak için buradayız.
            </p>
            <p class="about-content">
                Sevgiyle bağ kurulan bu dostlarımızın hayatlarına dokunmak, onları sahiplendirme sürecinde doğru insanlarla buluşturmak en büyük önceliğimiz.
                <span>Petiko</span>, sadece bir platform değil, hayvanseverlerin bir araya geldiği bir topluluktur.
                Burada sevgiyle büyüyen bir aileye katılabilir, siz de dostlarımız için bir fark yaratabilirsiniz.
            </p>
        </div>
    </section>






@endsection
