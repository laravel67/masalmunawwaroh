<x-content>
    <div class="container my-5">
        <div class="row justify-content-around">
            @forelse ($prestasi as $pres)
            <div class="col-lg-4 col-md-4 mb-4  wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item">
                    <div class="btn btn-sm btn-success w-100">
                        <i class="fas fa-tag"></i>
                        {{ 'Tingkat '. $pres->tingkat }}
                    </div>
                    <img src="{{ $pres->image ? asset('storage/'.$pres->image) : 'https://placehold.jp/400x350.png' }}" alt="{{ $pres->name }}" class="img-fluid w-100 mb-4">
                    <h3 class="mb-3 text-start">{{ $pres->title }}</h3> 
                    <a href="{{ route('prestasi.detail', $pres->slug) }}" class="btn btn-light btn-sm">
                        <i class="fas fa-folder"></i>
                        {{ __('Detail') }}
                    </a>
                </div>
            </div>
            @empty
                <p class="text-center">{{ __('Data tidak tersedia.') }}</p>
            @endforelse
        </div>
    </div>
</x-content>