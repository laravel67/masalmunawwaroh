<x-content>
    <div class="container my-5 col-md-6">
        
        <div class="row wow fadeInUp mb-5" data-wow-delay="0.1s">
            <div class="col-md-12">
                @if ($info)
                    <div class="row g-5 align-items-center justify-content-center mb-1">
                        <div class="col-md-10 wow fadeIn" data-wow-delay="0.3s">
                            <h3 class="mb-3">{{ __('Penerimaaan Peserta Didik Baru Tahun Ajaran ').$info->name }}</h3> 
                            {{-- <x-shareMedsos/> --}}
                            @if ($info->image)
                                <img class="img-fluid w-100" src="{{ asset('storage/'.$info->image) }}" alt="">
                            @else
                                <img class="img-fluid w-100" src="https://placehold.jp/1000x800.png" alt="Placeholder Image">
                            @endif
                            <div class="my-3">
                                <a class="btn btn-light btn-sm" href="{{ route('posts', ['author' => $info->chief]) }}">
                                    <small>
                                        <i class="fas fa-user-tie"></i>
                                        {{ $info->chief }}
                                    </small>
                                </a>
                                <div class="btn btn-light btn-sm">
                                    <i class="fas fa-clock"></i>
                                    {{ $info->created_at->diffForHumans() }}
                                </div>
                            </div>
                            <article align="justify" class="text-dark mb-3" style="overflow: hidden">
                                {!! $info->body !!}
                            </article>
                            <a href="{{ route('formulir.psb') }}" class="btn btn-success py-3 px-5 wow fadeIn" data-wow-delay="0.5s">{{ __('Formulir Pendaftaran') }}</a>
                        </div>
                    </div>
                @else
                    <p class="text-center" >{{ __('Belum ada informasi PPDB.') }}</p>  
                @endif
            </div>
        </div>
    </div>
</x-content>
