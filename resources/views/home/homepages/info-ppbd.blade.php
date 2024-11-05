<div class="container-fluid feature mt-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row g-0">
            <div class="col-lg-6 pt-lg-5">
                <div class="bg-white px-3 py-5 mt-lg-8">
                    <h1 class="display-6 mb-4 wow fadeIn text-success w-100 text-center" data-wow-delay="0.3s">Informasi PPDB</h1>
                    <h4 class="text-end"></h4>
                    <div>
                        @if ($info)
                            <img src="{{ asset('storage/'.$info->image) }}" alt="Gambar PSB" style="max-width: 100%; height: auto;">
                            <article style="line-height: 30px" align="justify" class="my-2 text-dark">
                                {!! Str::limit($info->body, 400, '...') !!}
                                <a href="{{ route('informasi.psb') }}">Selengkapnya</a>
                            </article>
                        @else
                            <p>Data tidak tersedia.</p>
                        @endif
                    </div>                    
                    <a href="{{ route('formulir.psb') }}" class="btn btn-success py-3 px-5 wow fadeIn" data-wow-delay="0.5s">{{ __('Formulir Pendaftaran') }}</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row h-100 align-items-end">
                    <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                        <div class="d-flex align-items-center justify-content-center" style="min-height: 300px;">
                            <button type="button" class="btn-play" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <span></span>
                            </button>
                            <div class="modal modal-video fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">{{ __('Informasi PPDB Al-Munawwaroh') }}</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <iframe width="100%" height="500" 
                                        src="https://www.youtube.com/embed/ujLZeM5DMtY?autoplay=1" 
                                        frameborder="0" 
                                        allow="encrypted-media" 
                                        allowfullscreen></iframe>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>