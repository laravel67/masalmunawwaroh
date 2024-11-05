@props(['type' => 'text', 'name' => '', 'value' => '', 'title'=>''])
<div class="form-group">
    <label for="{{ $name }}">{{ $title }}</label>
    <textarea {{ $attributes }} class="form-control @error($name)
        is-invalid
    @enderror" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}" wire:model="{{ $name }}"> {{ old($name, $value) }}</textarea>
    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>