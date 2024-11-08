@push('js')
    <script>
        const title=document.querySelector('#title');
        const slug=document.querySelector('#slug');
        title.addEventListener('keyup', function(){
        fetch('/achievments/slug?title=' +title.value)
        .then(response=> response.json())
        .then(data=> slug.value=data.slug)
        })
    
        // Preview Image
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