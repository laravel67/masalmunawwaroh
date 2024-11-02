<x-content>
    <div class="container">
        <div class="row wow fadeInUp mb-5" data-wow-delay="0.1s">
            <div class="col-md-12">
                @if ($sarana)
                <div class="row g-5 align-items-center justify-content-center mb-1">
                    <div class="col-md-10 wow fadeIn" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
                        <div class="mb-2">
                            <x-shareMedsos/>
                        </div>
                        @if ($sarana->image)
                        <img class="img-fluid w-100" src="{{ asset('storage/'.$sarana->image) }}" alt="">
                        @else
                        <img class="img-fluid w-100" src="https://placehold.jp/1000x800.png" alt="">
                        @endif
                        <div class="my-3">
                            {{-- <a class="btn btn-light btn-sm" href="{{ route('saranas', ['author' => $sarana->author->username]) }}">
                                <small>
                                    <i class="fas fa-user-tie"></i></i>
                                    {{ $sarana->author->name }}
                                </small>
                            </a>
                            <a class="btn btn-light btn-sm" href="{{ route('saranas', ['category' => $sarana->category->slug]) }}">
                                <small>
                                    <i class="fas fa-tag"></i></i>
                                    {{ $sarana->category->name }}
                                </small>
                            </a> --}}
                            <div class="btn btn-light text-uppercase">
                                <i class="fas fa-school text-success"></i></i>
                                {{ $sarana->jumlah_unit.' Unit' }}
                            </div>
                        </div>
                        <article align="justify" class="text-dark mb-3" style="overflow: hidden">
                            {!! $sarana->body !!}
                        </article>
                        <a href="{{ route('sarana') }}" class="mb-1">Kembali</a>
                    </div>
                </div>
                @else
                  <p>{{ __('Berita tidak ditemukan.') }}</p>  
                @endif
            </div>
        </div>
    </div>
</x-content>