<x-content>
    <div class="container img-fluid my-5" data-aos="fade-up" data-aos-duration="500">
        @if($struktur->image)
        <img class="img-fluid mt-3" src="{{ asset('storage/' . $struktur->image) }}" alt="Struktur Image">
        @else
        <p>{{ __('Struktur Organisasi Belum dimuat') }}</p>
        @endif
    </div>
</x-content>