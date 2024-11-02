<x-content>
    <div class="container my-5">
        <div class="row g-5 align-items-center mb-5">
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
                <img class="img-fluid w-100" src="{{ asset('mas/img/foto-guru.png') }}" alt="">
            </div>
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
                <h1 class="display-6 mb-3">{{ $guru->name }}</h1>
                <p class="mb-1">Guru Mapel : </p>
                <p class="mb-1">Mulai Mengjar : {{ $guru->mulai_mengajar }}</p>
                <p class="mb-1">Pendidikan : {{ $guru->pendidikan }}</p>
                <h3 class="mb-3">Biograpi</h3>
                <article align="justify" class="mb-3">
                    {{ $guru->deskripsi }}
                </article>
                <x-shareMedsos/>
            </div>
        </div>
        <x-btn-back/>
    </div>
</x-content>