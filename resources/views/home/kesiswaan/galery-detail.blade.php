<x-content>
    <div class="container my-5">
        <x-shareMedsos/>
        <div class="row justify-content-center my-md-5">
            <div class="text-center">
                <h3 class="mb-1 text-success">{{ $galery->title }}n</h3>
                <span>{{ 'Diposting :'.$galery->created_at->translatedFormat('d F Y') }}</span>
            </div>
            @if ($galery->category=='foto')
            <div class="col-md-3 col-lg-3 mb-5">
                <img class="img-fluid" src="{{ $galery->images }}" alt="">
            </div>
            @else
            <div class="video-responsive mb-4 d-flex justify-content-center">
                <iframe class="img-fluid"
                        src="{{ 'https://www.youtube.com/embed/' . preg_replace('/.*(?:youtu.be\/|watch\?v=|embed\/)([^&?]+).*/', '$1', $galery->link_video) }}"
                        frameborder="0"
                        allow="encrypted-media"
                        allowfullscreen>
                </iframe>
            </div>
            
            @endif
            <div class="team-item mb-5">
                <article align="justify" class="text-dark">
                    {!! $galery->body !!}
                </article>
            </div>
        </div>
        <x-btn-back/>
    </div>
</x-content>