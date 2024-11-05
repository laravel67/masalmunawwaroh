<x-content>
    <div class="d-md-flex align-item-center justify-content-around wow fadeInUp mb-5 px-2" data-wow-delay="0.1s">
        @if (!$subtitle)
            <h3>{{ __('Berita terbaru') }}</h3>
        @else
            <h3>{{ $subtitle }}</h3>
        @endif
        <form class="d-flex" action="{{ route('posts') }}">
            @if (request('category', 'author'))
            <input type="hidden" name="category" value="{{ request('category',old('category')) }}">
            <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <input class="form-control me-2" type="search" name="search" placeholder="Cari..." value="{{ Request('search') }}">
            <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
          </form>
    </div>
    <div class="container">
        <div class="row wow fadeInUp mb-5" data-wow-delay="0.1s">
            <div class="col-md-9">
                @if (!$posts->isEmpty())
                <div class="row g-5 align-items-center mb-1">
                    <div class="col-md-7 wow fadeIn" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
                        <h3 class="mb-3">{{ $posts[0]->title }}</h3> 
                        @if ($posts[0]->image)
                        <img class="img-fluid w-100" src="{{ asset('storage/'.$posts[0]->image) }}" alt="">
                        @else
                        <img class="img-fluid w-100" src="https://placehold.jp/1000x800.png" alt="">
                        @endif
                    </div>
                    <div class="col-md-4 px-0 wow fadeIn" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
                        <p class="mb-1">Oleh: {{ $posts[0]->author->name }}</p>
                        <p class="mb-2">Diposting : {{ $posts[0]->created_at->diffForHumans() }}</p>
                        <article align="justify" class="text-dark mb-3" style="overflow: hidden">
                            {!! Str::limit($posts[0]->body, 600) !!}
                            <a href="{{ route('post',$posts[0]->slug) }}">{{ __('selengkapnya') }}</a>
                        </article>
                    </div>
                </div>
                @else
                  <p>{{ __('Berita tidak ditemukan.') }}</p>  
                @endif
            </div>
            <div class="col-md-3">
                <div class="list-group list-group-flush mb-lg4">
                    <div class="list-group-item list-group-item-action bg-success text-light fw-bold" aria-current="true">
                      {{ __('Kategori Berita') }}
                    </div>
                    @forelse ($categories as $category)
                    <a href="{{ route('posts', ['category' => $category->slug]) }}" class="list-group-item">{{ $category->name }}</a>
                    @empty
                        <span>{{ __('Kategori tidak ditemukan.') }}</span>
                    @endforelse
                </div>
                <div class="accordion accordion-flush mt-lg-3" id="accordionFlushExample">
                    <h6 class="bg-success text-light px-2">Agenda & Acara Terbaru</h6>
                        @forelse ($jadwals as $jadwal)
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            {{ $jadwal->name }} asansb
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul>
                                    <li class="my-2">
                                        <small>
                                            <label for="" class="text-dark">Tempat:</label>
                                            {{ $jadwal->tempat }}
                                        </small>
                                    </li>
                                    <li class="my-2">
                                        <small>
                                            <label for="" class="text-dark">Waktu:</label>
                                            {{ \Carbon\Carbon::parse($jadwal->waktu)->translatedFormat('l, d F Y H:i') }}
                                        </small>                                        
                                    </li>
                                    <a href="{{ route('detail.agenda', $jadwal->slug) }}">{{ __('Baca informasi') }}</a>
                                </ul>
                            </div>
                        </div>
                        </div>    
                        @empty  
                        <p>{{ __('Belum ada acara terbaru.') }}</p> 
                        @endforelse
                  </div>
            </div>
        </div>
        <div class="row">
            <div class="d-flex justify-content-around align-items-center mb-5">
                <div class="flex-grow-1 border-bottom" style="height: 2px;"></div>
                <span class="text-uppercase mx-3">{{ __('Berita Lainnya') }}</span>
                <div class="flex-grow-1 border-bottom" style="height: 2px;"></div>
            </div>
            
            @foreach ($posts as $post)
            <div class="col-lg-4 col-md-6 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item">
                    <a class="btn btn-sm btn-dark" href="{{ route('posts', ['category' => $post->category->slug]) }}">
                        <i class="fas fa-tag"></i></i>
                        {{ $post->category->name }}
                    </a>
                    <img src="{{ $post->image ? asset('storage/'.$post->image) :'https://placehold.jp/400x350.png' }}" alt="{{ $post->image }}" class="img-fluid w-100 mb-4">
                    <h5 class="mb-3 text-start">{{ $post->title }}</h4>
                        <article align="justify" class="mb-4">
                            {{ $post->excerpt}}
                            <a href="{{ route('post',$post->slug) }}">{{ __('...Selengkapnya') }}</a>
                        </article>
                        <a class="btn btn-light btn-sm" href="{{ route('posts', ['author' => $post->author->username]) }}">
                            <small>
                                <i class="fas fa-user-tie"></i></i>
                                {{ $post->author->name }}
                            </small>
                        </a>
                        <div class="btn btn-light btn-sm">
                            <i class="fas fa-clock"></i></i>
                            {{ $post->created_at->diffForHumans() }}
                        </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mb-5">
            {{ $posts->links() }}
        </div>
    </div>
</x-content>