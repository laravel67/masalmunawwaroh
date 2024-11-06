<x-app-layout>
    @if (!Route::is('home'))
    <x-headeTitle :title="$title" />
    <div class="container my-3">
        <x-shareMedsos/>
    </div>
    @endif
    {{ $slot }}
</x-app-layout>