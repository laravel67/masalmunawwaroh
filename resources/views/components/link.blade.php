@props(['href'=>'#','title'=>'', 'active'=>'', 'icon'=>'', 'onclick'=>''])
<li class="nav-item">
    <a onclick="{{ $onclick }}" href="{{ $href }}" class="nav-link {{ $active ? 'active':'' }}">
      <i class="nav-icon fas fa-{{ $icon }}"></i>
      <p>{{ $title }}</p>
    </a>
</li>
