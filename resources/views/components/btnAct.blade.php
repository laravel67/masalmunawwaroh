@props(['title'=>''])
<div class="btn-group">
    <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
      {{ __('opsi') }}
    </button>
    <div class="dropdown-menu" role="menu" style="">
      {{ $slot }}
    </div>
</div>