<x-content>
    <div class="container">
        <x-liner title="BEM PUTRA"/>
        <img src="{{ asset('mas/img/330647031_513229030867046_7184462274685170156_n.jpg') }}" class="img-fluid w-100 mb-5">

        @if ($pa)
        <img src="{{ asset('storage/bem/' . $pa->image) }}" class="img-fluid w-100 mb-5">
        @else
        <span>{{ __('Tidak ada data') }}</span>
        @endif
        <x-liner title="BEM PUTRI"/>
        @if ($pi)
        <img src="{{ asset('storage/bem/' . $pi->image) }}" class="img-fluid w-100 mb-5">
        @else
            <span>{{ __('Tidak ada data') }}</span>
        @endif
    </div>
</x-content>