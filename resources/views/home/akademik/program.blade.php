<x-content>
    <div class="container my-5 d-flex justify-content-center">
      @forelse ($programs as $program)
      <div class="accordion accordion-flush col-md-6 text-center" id="accordionFlushExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#program-{{ $program->slug }}">
                <h3 class="text-success"><i class="far fa-star tex-success"></i>  {{ $program->name }}</h3>
              </button>
            </h2>
            <div id="program-{{ $program->slug }}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
                  <article class="text-dark" align="justify">
                      <img src="{{ asset('storage/'.$program->image) }}" alt="{{ $program->image }}" class="img-fluid my-4">
                      {!! $program->body !!}
                  </article>
              </div>
            </div>
          </div>
        </div> 
      @empty
          <p class="text-center">{{ __('Data belum dimuat') }}</p>
      @endforelse
    </div>
</x-content>