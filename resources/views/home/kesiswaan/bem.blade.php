<x-content>
    <div class="container text-center">
        <x-liner title="BEM PUTRA"/>
        @if ($pa)
        <img src="{{ asset('storage/' . $pa->image) }}" class="img-fluid w-100 mb-5">
        @else
        <span class="text-center">{{ __('Tidak ada data') }}</span>
        @endif
        <x-liner title="BEM PUTRI"/>
        @if ($pi)
        <img src="{{ asset('storage/' . $pi->image) }}" class="img-fluid w-100 mb-5">
        @else
            <span class="text-center">{{ __('Tidak ada data') }}</span>
        @endif
    </div>
</x-content>