<x-content>
    <div class="container my-5">
        <div class="row  g-4">
            @forelse ($gurus as $guru)
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        @if ($guru->image)
                            <img class="img-fluid w-100" src="{{ asset('storage/'.$guru->image) }}" alt="{{ $guru->image }}">
                        @else
                            <img class="img-fluid w-100" src="{{ asset('mas/img/foto-guru.png') }}" alt="">
                        @endif
                        <div class="team-social">
                            <a class="btn btn-light" href="{{ route('guru.detail', $guru->slug) }}">{{ __('Lihat Biografi') }}</a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-1">{{ $guru->name }}</h5>
                        <span>Guru {{ $guru->guru_mapel }}</span>
                    </div>
                </div>
            </div>
            @empty
            <p>Tidak ada</p>
            @endforelse 
        </div>
    </div>
</x-content>