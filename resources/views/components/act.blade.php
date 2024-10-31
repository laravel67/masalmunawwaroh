@props(['title'=>'', 'href'=>'#', 'model'=>'', 'icon'=>''])
<a {{ $attributes }} class="dropdown-item" href="{{ $href }}" wire:click="{{ $model }}"> <i class="fas fa-{{ $icon }}"></i> {{ $title }}</a>