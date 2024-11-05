<x-content>
    <div class="container col-md-6">
        <div class="row wow fadeInUp mb-5" data-wow-delay="0.1s">
            <div class="col-md-12">
                @if ($prestasi)
                <div class="row g-5 align-items-center justify-content-center mb-1">
                    <div class="col-md-10 wow fadeIn" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
                        <h3>{{ $prestasi->title }}</h3>
                        @if ($prestasi->image)
                        <img class="img-fluid w-100" src="{{ asset('storage/'.$prestasi->image) }}" alt="">
                        @else
                        <img class="img-fluid w-100" src="https://placehold.jp/1000x800.png" alt="">
                        @endif
                        <div class="my-3">
                            {{-- <a class="btn btn-light btn-sm" href="{{ route('prestasis', ['author' => $prestasi->author->username]) }}">
                                <small>
                                    <i class="fas fa-user-tie"></i></i>
                                    {{ $prestasi->author->name }}
                                </small>
                            </a>
                            <a class="btn btn-light btn-sm" href="{{ route('prestasis', ['category' => $prestasi->category->slug]) }}">
                                <small>
                                    <i class="fas fa-tag"></i></i>
                                    {{ $prestasi->category->name }}
                                </small>
                            </a> --}}
                            <div class="badge bg-secondary text-capitalize">
                                <i class="fas fa-school"></i></i>
                                {{ 'Tingkat : '.$prestasi->tingkat }}
                            </div>
                            <div class="badge bg-info text-capitalize">
                                <i class="fas fa-tag"></i></i>
                                {{ 'Kategori : '.$prestasi->category }}
                            </div>
                            <div class="badge bg-light text-capitalize text-dark">
                                <i class="far fa-calendar-alt"></i></i>
                                {{ \Carbon\Carbon::parse($prestasi->created_at)->translatedFormat('d F Y') }}
                            </div>
                        </div>
                        <article align="justify" class="text-dark mb-3" style="overflow: hidden">
                            {!! $prestasi->body !!}
                        </article>
                        <x-btn-back/>
                    </div>
                </div>
                @else
                  <p>{{ __('Berita tidak ditemukan.') }}</p>  
                @endif
            </div>
        </div>
    </div>
</x-content>