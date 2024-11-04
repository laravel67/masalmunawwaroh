
<x-content>
    <div class="container my-5">
        @if ($sambutan)
        <div class="row align-items-center justify-content-center mb-5">
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.3s">
                @if ($sambutan ? $sambutan->image:'')
                    <img class="img-fluid w-100" src="{{ asset('/storage/profiles/'.$sambutan->image) }}">
                @else
                    <img class="img-fluid w-100" src="{{ asset('mas/img/foto-guru.png') }}"> 
                @endif
            </div>
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.5s">
                @if ($sambutan)
                <h4 class="text-end">السَّلَامُ عَلَيْكُمْ وَرَحْمَةُ اللهِ وَبَرَكَاتُهُ</h4>
                @endif
                <article align="justify" style="line-height: 35px" class="text-dark">
                    {!! $sambutan ? $sambutan->sambutan:'' !!}
                </article>
            </div>
        </div>
        @endif
        <p class="text-center">{{ __('Data kosong') }}</p>
    </div>
</x-content>