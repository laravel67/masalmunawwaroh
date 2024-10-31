@props(['href'=>'', 'title'=>'', 'icon'=>'', 'color'=>'success'])
<a {{ $attributes }} class="btn btn-sm btn-{{ $color }} " href="{{ $href }}" >
    <i class="fas fa-{{ $icon }}"></i> {{ $title }}
</a>
