<x-main>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-info">
          <div class="card-header">
            <h3 class="card-title">
              {{ __('Buat Sarana Prasarana') }}
            </h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <form action="{{ route('asarana.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-input title="Nama Sarana Prasarana" type="text" name="name" value="{{ old('name') }}"/>
                    <x-input title="Slug Sarana Prasarana" type="text" name="slug" value="{{ old('slug') }}"/>
                    <x-input title="Jumlah Sarana Prasarana (Unit)" type="number" name="jumlah_unit" value="{{ old('jumlah_unit') }}"/>
                    <x-input-text-area name="body" value="{{ old('body') }}"/>
                    <x-input name="image" type="file" onchange="previewImage()" accept="image/*"/>
                    <x-btn-form/>
                    <img id="previewContainer" class="mt-3 img-fluid" width="300">
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