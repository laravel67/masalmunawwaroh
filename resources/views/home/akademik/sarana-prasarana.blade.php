<x-content>
    <div class="container my-5">
        <div class="row">
            @forelse ($saranas as $sarana)
            <div class="col-lg-6 col-md-6 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item">
                    <div class="btn btn-sm btn-success w-100">
                        <i class="fas fa-tag"></i>
                        {{ $sarana->jumlah_unit.' Unit' }}
                    </div>
                    <img src="{{ $sarana->image ? asset('storage/'.$sarana->image) : 'https://placehold.jp/400x350.png' }}" alt="{{ $sarana->name }}" class="img-fluid w-100 mb-4">
                    <h3 class="mb-3 text-start">{{ $sarana->name }}</h3> 
                    <a href="{{ route('sarana.detail', $sarana->slug) }}" class="btn btn-light btn-sm">
                        <i class="fas fa-folder"></i>
                        {{ __('Detail') }}
                    </a>
                </div>
            </div>
            @empty
                <p class="text-center">Data tidak tersedia.</p>
            @endforelse
        </div>
    </div>
</x-content>