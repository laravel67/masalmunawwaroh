<x-content>

    <div class="container my-5">
        <x-liner title="Fisik"/>
        <div class="row">
            @forelse ($fisik as $row)
            <div class="col-lg-4 col-md-4 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item">
                    <img src="{{ $row->image ? asset('storage/'.$row->image) : 'https://placehold.jp/400x350.png' }}" alt="{{ $row->name }}" class="img-fluid w-100 mb-4">
                    <h3 class="mb-3 text-start">{{ $row->name }}</h3> 
                    <a href="{{ route('ekskul.detail', $row->slug) }}" class="btn btn-light btn-sm">
                        <i class="fas fa-folder"></i>
                        {{ __('Detail') }}
                    </a>
                </div>
            </div>
            @empty
                <p class="text-center">Data tidak tersedia.</p>
            @endforelse
        </div>
        <x-liner title="Non Fisik"/>
        <div class="row">
            @forelse ($nonfisik as $row)
            <div class="col-lg-4 col-md-4 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item">
                    <img src="{{ $row->image ? asset('storage/'.$row->image) : 'https://placehold.jp/400x350.png' }}" alt="{{ $row->name }}" class="img-fluid w-100 mb-4">
                    <h3 class="mb-3 text-start">{{ $row->name }}</h3> 
                    <a href="{{ route('ekskul.detail', $row->slug) }}" class="btn btn-light btn-sm">
                        <i class="fas fa-folder"></i>
                        {{ __('Detail') }}
                    </a>
                </div>
            </div>
            @empty
                <p class="text-center">Data tidak tersedia.</p>
            @endforelse
        </div>
    </div>
</x-content>