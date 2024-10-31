@props(['name' => '', 'value' => '', 'title'=>'', 'width'=>''])

<div class="form-group">
    <label for="{{ $name }}">{{ $title }}</label>
    <textarea name="{{ $name }}" wire:model='{{ $name }}' id="summernote" {{ $attributes->merge(['class' => 'form-control ' . ($errors->has($name) ? 'is-invalid' : '')]) }}>{{ $value }}</textarea>
    {{-- <input id="{{ $name }}" type="hidden" name="{{ $name }}" value="{{ old($name, $value) }}"
        class="{{ $errors->has($name) ? 'is-invalid' : '' }}">
    <trix-editor input="{{ $name }}"></trix-editor> --}}
    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
@push('css')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
@endpush
@push('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
<script>
    $('#summernote').summernote({
      placeholder: 'Tulis pragraph...',
      tabsize: 2,
      height: `{{ $width }}`,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ]
    });
  </script>
@endpush