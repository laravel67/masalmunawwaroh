<button type="button" id="btn-copy" title="Salin link formulir" class="btn btn-outline-secondary btn-sm" style="width: 30px;
        height: 30px;"><i class="fa-solid fa-paperclip"></i></button>
@push('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
        const linkCopy='https://depatiagung.my.id/ppdb/formulir-pendaftaran';
        const btnCopy= document.querySelector("#btn-copy");
        const inputCopy=document.createElement('input');
        btnCopy.addEventListener('click', function(){
                inputCopy.value=linkCopy;
                document.body.appendChild(inputCopy);
                inputCopy.select();
                inputCopy.setSelectionRange(0, 99999);
                document.execCommand('copy');
                document.body.removeChild(inputCopy);
                Swal.fire({
                        text: "Link berhasil di salin!",
                        icon: "success"
                });
        });
});
</script>
@endpush