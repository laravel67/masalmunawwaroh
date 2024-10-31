@props(['slides' => []])
<div class="d-block align-items-center text-center mt-5 mb-3 text-white-50 bg-purple rounded shadow-sm">
    <div class="px-2 d-md-block">
        <img class="mt-3" src="{{ asset('img/logo-almunawwaroh.png') }}" alt="Logo" width="50" height="50"><br>
        <h3 class="mb-0 py-2">{{ __("MADRASAH ALIYAH") }}</h3>
        <h3 class="text-light mb-1 text-uppercase">{{ __('المنوره') }}</h3>
        <h6 class="mb-0 py-0 text-light">{{ __('"Mendidik dengan sepenuh hati"') }}</h6>
        <p class="text-warning mt-0 d-none d-md-block">{{ __('Jl. Raya Lintas Utama Sumatera, Dusun Bangko, Kec. Bangko, Kabupaten Merangin, Jambi 37311.') }}</p>
    </div>
    @if ($slides->isNotEmpty())
    <div id="slideJumbotron" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($slides as $key => $slide)
            <li data-target="#slideJumbotron" data-slide-to="{{ $key }}" @if($key===0) class="active" @endif></li>
            @endforeach
        </ol>

        <div class="carousel-inner bg-secondary">
            @foreach($slides as $key => $slide)
            <div class="carousel-item @if($key === 0) active @endif">
                @if ($slide->image)
                <div class="d-md-none d-lg-none">
                    <img src="{{ asset('storage/slides/'.$slide->image) }}" class="img-fluid w-100" alt="Slide Image">
                </div>
                
                <div class="d-none d-md-block">
                    <img src="{{ asset('storage/slides/'.$slide->image) }}" class="img-fluid w-50" alt="Slide Image">
                </div>
                
                @else
                <img src="{{ asset('frontend/img/da2.jpg') }}" class="img-fluid w-100" alt="Default Image">
                @endif
                <div class="carousel-caption rounded-3" style="background-color:rgba(0, 0, 0, 0.7)">
                    <p class="text-light">{{ $slide->caption }}</p>
                </div>
            </div>
            @endforeach
        </div>

        <a class="carousel-control-prev" href="#slideJumbotron" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">{{ __('Previous') }}</span>
        </a>
        <a class="carousel-control-next" href="#slideJumbotron" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">{{ __('Next') }}</span>
        </a>
    </div>
    @endif
</div>