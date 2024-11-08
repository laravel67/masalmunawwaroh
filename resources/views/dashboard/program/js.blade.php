@push('js')
<script>
    const name=document.querySelector('#name');
    const slug=document.querySelector('#slug');
    name.addEventListener('keyup', function(){
        fetch('/program/slug?name=' +name.value)
        .then(response=> response.json())
        .then(data=> slug.value=data.slug)
    })

   
    function previewImage(){
        const image=document.querySelector('#image');
        const imgPreview=document.querySelector('#previewContainer');
        imgPreview.style.display='block';
        const oFReader= new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload=function(oFREvent){
            imgPreview.src=oFREvent.target.result;
        }
    }
</script>
@endpush