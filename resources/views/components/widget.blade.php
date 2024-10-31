
@props(['title'=>'', 'icon'=>'', 'bg'=>'', 'value'=>''])
<div class="col-12 col-sm-6 col-md-3">
  <div class="info-box">
    <span class="info-box-icon bg-{{ $bg }} elevation-1"><i class="fas fa-{{ $icon }}"></i></span>
    <div class="info-box-content">
      <span class="info-box-text">{{ $title }}</span>
      <span class="info-box-number">
        {{ $value }}
      </span>
    </div>
  </div>
</div>
