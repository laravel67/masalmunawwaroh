<x-content>
    <div class="container my-5">
        <div class="row">
            @forelse ($agendas as $agenda)
            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('storage/'.$agenda->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <article class="card-text">
                        {!! Str::limit($agenda->body, 50, '...') !!}
                        <a href="{{ route('detail.agenda', $agenda->slug) }}">selengkapnya</a>
                      </article>
                    </div>
                  </div>
            </div>
            @empty
                
            @endforelse
        </div>
    </div>
</x-content>