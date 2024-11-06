<x-content>
   <div class="container my-5">
        <div class="row g-4 mb-5">
            @forelse ($galeries as $galery)
            <div class="col-lg-3 col-md-4 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <a href="{{ route('album.detail', $galery->slug) }}">
                    <div class="service-item text-center">
                        <img src="{{ $galery->category=='foto' ? asset('img/galery-thumbnail.png') : asset('img/video-thumbnail.png') }}" class="img-fluid" width="100">
                        <h6 class="mb-3">{{ $galery->title }}</h6>
                        <span>{{ $galery->created_at->translatedFormat('d F Y') }}</span>
                    </div>
                </a>
            </div>
            @empty
            <p class="text-center">{{ __('Data belum dimuat') }}</p>
            @endforelse
        </div>
        <d class="d-flex my-5 justify-content-center">
            {{ $galeries->links() }}
        </d>
   </div>
</x-content>