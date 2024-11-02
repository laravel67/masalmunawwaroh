@props(['active'=> '', 'title'=>''])
<div class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle text-uppercase  {{ $active ? 'text-success':'' }}" data-bs-toggle="dropdown">{{ $title }}</a>
    <div class="dropdown-menu bg-light m-0">
        {{ $slot }}
    </div>
</div>