<div class="container-fluid testimonial py-5">
    <div class="container pt-5">
        <div class="row gy-5 gx-0">
            <div class="col-lg-6 pe-lg-5 wow fadeIn" data-wow-delay="0.3s">
                <h1 class="display-6 text-white mb-4">{{ __('Pesan & Kesan Alumnus') }}</h1>
                <a href="{{ route('alumnus') }}" class="btn btn-success py-3 px-5">{{ __('Buat Pesan dan Kesan Anda') }}</a>
            </div>
            <div class="col-lg-6 mb-n5 wow fadeIn" data-wow-delay="0.5s">
                <div class="bg-white p-5">
                    <div class="owl-carousel testimonial-carousel wow fadeIn" data-wow-delay="0.1s">
                        
                        @foreach ($alumnus as $alumni)
                        <div class="testimonial-item">
                            <div class="icon-box-primary mb-4">
                                <i class="bi bi-chat-left-quote text-dark"></i>
                            </div>
                            <article class="fs-5 mb-4">
                                {{ Str::limit($alumni->pesan_kesan, 200) }} 
                            </article>
                            <div class="d-flex align-items-center">
                                @if ($alumni->image)
                                    <img class="flex-shrink-0" src="{{ asset('storage/'.$alumni->image) }}" alt="">    
                                @else
                                    <img class="flex-shrink-0" src="{{ asset('mas/img/foto-guru.png') }}" alt="">    
                                @endif
                                <div class="ps-3">
                                    <h5 class="mb-1">{{ Str::limit($alumni->pesan_kesan, 50) }}</h5>
                                    <span class="text-primary">{{ 'Angkatan Ke-'. $alumni->angkat }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>