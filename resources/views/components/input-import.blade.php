@props(['name' => '', 'value' => '', 'title'=>''])
<div class="form-group">
    <label for="{{ $name }}">{{ $title }}</label>
    <input class="form-control @error($name)
        is-invalid
    @enderror"
    type="file" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}" required>
    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    <div class="invalid-feedback" id="fileError"></div>
</div>
@push('js')
    <script>
        document.getElementById('{{ $name }}').addEventListener('change', function(event) {
        let fileInput = event.target;
        let filePath = fileInput.value;
        let allowedExtensions = /(\.xlsx|\.xls)$/i;
        let fileError = document.getElementById('fileError');
    
        // Reset error message
        fileError.textContent = '';
    
        if (!filePath) {
            fileError.textContent = 'File wajib diisi.';
            fileInput.classList.add('is-invalid');
        } else if (!allowedExtensions.exec(filePath)) {
            fileError.textContent = 'Harus berupa file Excel (.xlsx atau .xls).';
            fileInput.value = ''; // Clear the input if invalid
            fileInput.classList.add('is-invalid');
        } else {
            fileInput.classList.remove('is-invalid');
        }
    });
    </script>
@endpush