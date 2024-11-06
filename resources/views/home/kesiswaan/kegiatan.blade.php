<x-content>
    <div class="container my-5 d-flex justify-content-center">
        <div class="col-lg-9">
            <div class="accordion accordion-flush" id="accordionKegiatan">
              @forelse ($kegiatans as $kegiatan)
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#kegiatan-{{ $kegiatan->id }}">
                    <h3 class="text-success"> <i class="fas fa-list-ul"></i> {{ $kegiatan->name }}</h3>
                  </button>
                </h2>
                <div id="kegiatan-{{ $kegiatan->id }}" class="accordion-collapse collapse hidden" aria-labelledby="headingOne" data-bs-parent="#accordionKegiatan">
                  <div class="accordion-body">
                    <article align="justify" class="text-dark" style="line-height: 50px">
                      {!! $kegiatan->body !!}
                    </article>
                  </div>
                </div>
              </div>
              @empty
                <p class="text-center">{{ __('Data belum dimuat') }}</p>
              @endforelse
            </div>
        </div>
    </div>
</x-content>