<x-auth-layout>
    <x-slot:title >{{ $title ?? 'SISTEM INFORMASI MADRASAH' }}</x-slot:title>
    <x-slot:subTitle>{{ $subTitle ?? 'Dashbaord' }}</x-slot:subTitle>
    {{ $slot }}
</x-auth-layout>