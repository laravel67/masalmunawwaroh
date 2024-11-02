<x-main>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        {{ __('Ubah Program Unggulan') }}
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <form action="{{ route('aprogram.update', $program->slug) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                
                                <x-input type="text" title="Nama Program" name="name" value="{{ old('name', $program->name) }}" />
                                <x-input type="text" title="Slug Program" name="slug" value="{{ old('slug', $program->slug) }}" readonly />
                                <x-input-text-area width="400" name="body" title="Deskripsi Program" value="{!! old('body', $program->body) !!}" />
                                <x-input type="file" title="Image/Gambar" name="image" onchange="previewImage()" accept="image/*" />
                                <x-btn-form></x-btn-form>
                                
                                <img id="previewContainer" class="mt-3 img-fluid" width="300" 
                                     src="{{ $program->image ? asset('storage/' . $program->image) : asset('backend/img/no-image.svg') }}" 
                                     alt="{{ $program->name ?? 'No Image Available' }}" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.program.js')
</x-main>
