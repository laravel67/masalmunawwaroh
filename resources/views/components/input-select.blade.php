@props(['title' => '', 'name', 'options' => [], 'selected' => null, 'defaultOptions' => []])

<div class="form-group">
    <label for="{{ $name }}">{{ $title }}</label>
    <select {{ $attributes->merge(['class' => 'form-control ' . ($errors->has($name) ? 'is-invalid' : '')]) }}
        name="{{ $name }}" id="{{ $name }}" wire:model.lazy="{{ $name }}">
        <option value="">-- Pilih {{ $title }} --</option>
        
        @foreach ($options as $option)
            <option value="{{ $option->id }}" 
                {{ (old($name) ?? $selected) == $option->id ? 'selected' : '' }}>
                {{ $option->name }}
            </option>
        @endforeach
        
        @foreach ($defaultOptions as $option)
            <option value="{{ $option['value'] }}" 
                {{ (old($name) ?? $selected) == $option['value'] ? 'selected' : '' }}>
                {{ $option['label'] }}
            </option>
        @endforeach
    </select>
    
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
