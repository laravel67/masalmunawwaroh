<div class="container-fluid container-service py-5">
    <div class="container pt-5 text-center">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="display-6 mb-3 text-success">{{ __('Berita & Artikel') }}</h1>
        </div>
        <div class="row g-4 mb-3">
            @foreach ($posts as $post)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item">
                    <img src="{{ $post->image ? asset('storage/'.$post->image) :'https://placehold.jp/400x350.png' }}" alt="{{ $post->image }}" class="img-fluid w-100 mb-4">
                    <h5 class="mb-3 text-start">{{ $post->title }}</h4>
                        <p align="justify" class="mb-4">
                            {{ $post->excerpt}}
                        </p>
                    <a class="btn btn-light px-3" href="{{ route('post',$posts[0]->slug) }}">{{ __('Selengkapnya') }}<i class="bi bi-chevron-double-right ms-1"></i></a>
                </div>
            </div>
            @endforeach
        </div>
        <a class="btn btn-success py-2 px-4 wow fadeIn" data-wow-delay="0.5s" href="{{ route('posts') }}">{{ __('Lihat Berita Lainya') }}</a>
    </div>
</div>