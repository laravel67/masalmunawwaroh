<x-content>
    <div class="container">
        <div class="row wow fadeInUp mb-5" data-wow-delay="0.1s">
            <div class="col-md-12">
                @if ($lifeskill)
                <div class="row g-5 align-items-center justify-content-center mb-1">
                    <div class="col-md-6 wow fadeIn" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
                        <div class="mb-2">
                            <x-shareMedsos/>
                        </div>
                        @if ($lifeskill->image)
                        <img class="img-fluid w-100" src="{{ asset('storage/'.$lifeskill->image) }}" alt="">
                        @else
                        <img class="img-fluid w-100" src="https://placehold.jp/1000x800.png" alt="">
                        @endif
                        <div class="my-3">
                            <div class="btn btn-light text-uppercase">
                                <i class="fas fa-tag text-success"></i></i>
                                {{ $lifeskill->category }}
                            </div>
                        </div>
                        <article align="justify" class="text-dark mb-3" style="overflow: hidden">
                            {!! $lifeskill->body !!}
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