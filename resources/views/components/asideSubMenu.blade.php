@props(['title'=>'', 'active'=>'', 'icon'=>''])
<li class="nav-item {{ $active ? 'menu-open':'' }}">
    <a href="#" class="nav-link {{ $active ? 'active':'' }}">
      <i class="nav-icon fas fa-{{ $icon }}"></i>
      <p>
        {{ $title }}
        <i class="fas fa-angle-left right"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      {{ $slot }}
    </ul>
</li>