<x-app-layout>
    {{-- <x-slot:title>{{ $title }}</x-slot:title> --}}
    @if (!Route::is('home'))
    <x-headeTitle :title="$title" />
    @endif

    {{ $slot }}
</x-app-layout>