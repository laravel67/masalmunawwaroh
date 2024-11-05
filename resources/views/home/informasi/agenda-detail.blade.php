<x-content>
    <div class="container my-5 col-md-6">
        <div class="row wow fadeInUp mb-5" data-wow-delay="0.1s">
            <div class="col-md-12">
                @if ($agenda)
                <div class="row g-5 align-items-center justify-content-center mb-1">
                    <div class="col-md-10 wow fadeIn" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
                        <h3 class="mb-3">{{ $agenda->title }}</h3> 
                        {{-- <x-shareMedsos/> --}}
                        @if ($agenda->image)
                        <img class="img-fluid w-100" src="{{ asset('storage/'.$agenda->image) }}" alt="">
                        @else
                        <img class="img-fluid w-100" src="https://placehold.jp/1000x800.png" alt="">
                        @endif
                        <div class="my-3">
                            {{-- <a class="btn btn-light btn-sm" href="{{ route('agendas', ['author' => $agenda->author->username]) }}">
                                <small>
                                    <i class="fas fa-user-tie"></i></i>
                                    {{ $agenda->author->name }}
                                </small>
                            </a> --}}
                            {{-- <a class="btn btn-light btn-sm" href="{{ route('agendas', ['category' => $agenda->category->slug]) }}">
                                <small>
                                    <i class="fas fa-tag"></i></i>
                                    {{ $agenda->category->name }}
                                </small>
                            </a> --}}
                            <div class="btn btn-light btn-sm">
                                <i class="fas fa-clock"></i></i>
                                {{ $agenda->created_at->diffForHumans() }}
                            </div>
                        </div>
                        <article align="justify" class="text-dark mb-3" style="overflow: hidden">
                            {!! $agenda->body !!}
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