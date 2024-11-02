<x-content>
    <div class="container">
        <div class="row wow fadeInUp mb-5" data-wow-delay="0.1s">
            <div class="col-md-12">
                @if ($post)
                <div class="row g-5 align-items-center justify-content-center mb-1">
                    <div class="col-md-10 wow fadeIn" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
                        <h3 class="mb-3">{{ $post->title }}</h3> 
                        <x-shareMedsos/>
                        @if ($post->image)
                        <img class="img-fluid w-100" src="{{ asset('storage/'.$post->image) }}" alt="">
                        @else
                        <img class="img-fluid w-100" src="https://placehold.jp/1000x800.png" alt="">
                        @endif
                        <div class="my-3">
                            <a class="btn btn-light btn-sm" href="{{ route('posts', ['author' => $post->author->username]) }}">
                                <small>
                                    <i class="fas fa-user-tie"></i></i>
                                    {{ $post->author->name }}
                                </small>
                            </a>
                            <a class="btn btn-light btn-sm" href="{{ route('posts', ['category' => $post->category->slug]) }}">
                                <small>
                                    <i class="fas fa-tag"></i></i>
                                    {{ $post->category->name }}
                                </small>
                            </a>
                            <div class="btn btn-light btn-sm">
                                <i class="fas fa-clock"></i></i>
                                {{ $post->created_at->diffForHumans() }}
                            </div>
                        </div>
                        <article align="justify" class="text-dark mb-3" style="overflow: hidden">
                            {!! $post->body !!}
                        </article>
                        <a href="{{ route('posts') }}" class="mb-1">Kembali</a>
                    </div>
                </div>
                @else
                  <p>{{ __('Berita tidak ditemukan.') }}</p>  
                @endif
            </div>
        </div>
    </div>
</x-content>