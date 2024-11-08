<div class="d-flex">
    <a class="btn btn-square btn-primary me-2" target="__blank" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"><i class="fab fa-facebook-f"></i></a>
    <a class="btn btn-square btn-success me-2" target="__blank" href="https://api.whatsapp.com/send/?text={{ url()->current() }}"><i class="fab fa-whatsapp"></i></a>
    <a class="btn btn-square btn-dark me-2 text-light" target="__blank" href="https://twitter.com/intent/tweet?text={{ url()->current() }}"><i class="fab fa-twitter"></i></a>
    <a class="btn btn-square btn-info text-light me-2" target="__blank" href="https://t.me/share/url?url={{ url()->current() }}"><i class="fab fa-telegram"></i></a>
    <a class="btn btn-square btn-primary text-light me-2" target="__blank" href="https://www.linkedin.com/sharing/share-offsite?mini={{ url()->current() }}"><i class="fab fa-linkedin"></i></a>
    <button type="button" title="Salin Tautan" id="btncopy" class="btn btn-square btn-secondary text-light me-2"><i class="fas fa-link"></i></button>
</div>

@push('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
        const linkCopy = "{{ url()->current() }}"; // Mengisi dengan URL halaman saat ini
        const btnCopy = document.querySelector("#btncopy");
        const inputCopy = document.createElement('input');

        btnCopy.addEventListener('click', function() {
                inputCopy.value = linkCopy;
                document.body.appendChild(inputCopy);
                inputCopy.select();
                inputCopy.setSelectionRange(0, 99999); // Untuk kompatibilitas di beberapa browser
                document.execCommand('copy');
                document.body.removeChild(inputCopy);

                Swal.fire({
                        text: "Link berhasil disalin!",
                        icon: "success"
                });
        });
});
</script>
@endpush
