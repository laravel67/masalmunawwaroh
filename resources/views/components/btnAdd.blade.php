@props(['href'=>'#', 'title'=>''])
<a {{ $attributes }} href="{{ $href }}" class="btn btn-success btn-sm rounded-0">
    <i class="fas fa-pen"></i>
    {{ $title }}
</a>