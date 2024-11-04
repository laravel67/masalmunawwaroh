<x-app-layout>
    {{-- <x-slot:title>{{ $title }}</x-slot:title> --}}
    @if (!Route::is('home'))
    <x-headeTitle :title="$title" />
    <div class="container my-3">
        <x-shareMedsos/>
    </div>
    @endif
    {{ $slot }}
</x-app-layout>