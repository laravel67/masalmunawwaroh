<x-content>
    <x-profile-header />
    <div data-aos="fade-up" data-aos-duration="500">
        
    @if ($pa)
    <div class="card mt-3 mb-1">
        <div class="card-body">
            <div class="container marketing">
                <img src="{{ asset('storage/persada/' . $pa->image) }}" class="img-fluid">
            </div>
        </div>
    </div>
    @else
    @endif
    @if ($pi)
    <div class="card mt-3 mb-1">
        <div class="card-body">
            <div class="container marketing">
                <img src="{{ asset('storage/persada/' . $pi->image) }}" class="img-fluid">
            </div>
        </div>
    </div>
    @else
    @endif
    </div>
</x-content>