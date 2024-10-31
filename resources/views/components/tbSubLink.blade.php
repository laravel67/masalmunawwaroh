@props(['active'=> '', 'title'=>''])
<li {{ $attributes }} class="nav-item dropdown mx-lg-3 {{ $active ? 'active':'' }}">
    <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">{{ $title }}</a>
    <div class="dropdown-menu bg-green">
        {{ $slot }}
    </div>
</li>