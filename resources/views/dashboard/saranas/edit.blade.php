<x-main>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-info">
          <div class="card-header">
            <h3 class="card-title">
              {{ __('Ubah Sarana Prasarana') }}
            </h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <form action="{{ route('asarana.update', $sarana->slug) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-input title="Nama Sarana Prasarana" type="text" name="name" value="{{ old('name',$sarana->name) }}"/>
                    <x-input title="Slug Sarana Prasarana" type="text" name="slug" value="{{ old('slug',$sarana->slug) }}"/>
                    <x-input title="Jumlah Sarana Prasarana (Unit)" type="number" name="jumlah_unit" value="{{ old('jumlah_unit',$sarana->jumlah_unit) }}"/>
                    <x-input-text-area name="body" value="{!! old('body',$sarana->body) !!}"/>
                    <x-input name="image" type="file" onchange="previewImage()" accept="image/*"/>
                    <x-btn-form/>
                    @if ($sarana->image)
                    <img id="previewContainer" src="{{ asset('storage/'.$sarana->image) }}" class="mt-3 img-fluid" width="300">
                    @else
                    <img id="previewContainer" class="mt-3 img-fluid" width="300">
                    @endif
                </form>
              </div>
              <x-image-draw/>
            </div>
          </div>
        </div>
      </div>
      <!-- /.col-->
    </div>
    @include('dashboard.saranas.script')
</x-main>