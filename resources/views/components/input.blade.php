@props(['type' => 'text', 'name' => '', 'value' => '', 'title'=>''])

<div class="form-group">
    <label for="{{ $name }}">{{ $title }}</label>
    <input {{ $attributes }} class="form-control @error($name)
        is-invalid
    @enderror"
    type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}" wire:model="{{ $name }}">
    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>