@props(['active' => false, 'href' => '#', 'title' => ''])

<a class="dropdown-item {{ $active ? 'bg-success text-light' : '' }}" href="{{ $href }}">{{ $title }}</a>
