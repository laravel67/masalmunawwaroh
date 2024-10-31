@props(['active' => false, 'href' => '#', 'title' => ''])

<a class="dropdown-item text-light {{ $active ? 'bg-dark' : '' }}" href="{{ $href }}">{{ $title }}</a>
