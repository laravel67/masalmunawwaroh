
<x-content>
    
    <div class="container">
        <div class="row align-items-center justify-content-center mb-5">
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.3s">
                @if ($sambutan ? $sambutan->image:'')
                    <img class="img-fluid w-100" src="{{ asset('/storage/profiles/'.$sambutan->image) }}">
                @else
                    <img class="img-fluid w-100" src="{{ asset('mas/img/foto-guru.png') }}"> 
                @endif
            </div>
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.5s">
                <article align="justify" style="line-height: 35px" class="text-dark">
                    {!! $sambutan ? $sambutan->sambutan:'' !!}
                </article>
            </div>
        </div>
    </div>
</x-content>