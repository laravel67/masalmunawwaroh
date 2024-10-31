@props(['href'=>'#','title'=>'', 'active'=>''])
<li class="nav-item {{ $active ? 'menu-open':'' }}">
    <a href="{{ $href }}" class="nav-link {{ $active ? 'active':'' }}">
      <i class="far fa-circle nav-icon"></i>
      <p>{{ $title }}</p>
    </a>
</li>