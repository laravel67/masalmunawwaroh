<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-headeTitle title="{{ $title }}"/>
    {{ $slot }}
</x-app-layout>