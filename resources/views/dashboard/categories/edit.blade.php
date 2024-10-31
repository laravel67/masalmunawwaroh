<x-main>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-info">
          <div class="card-header">
            <h3 class="card-title">
              {{ __('Ubah Kategori') }}
            </h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <form action="{{ route('category.update', $category->slug) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <x-input type="text" title="Nama Kategori" name="name" value="{{ old('name',$category->name) }}" />
                    <x-input type="text" title="Slug Kategori" name="slug" value="{{ old('slug',$category->slug) }}" readonly/>
                    <x-btn-form/>
                </form>
              </div>
              <x-image-draw/>
            </div>
          </div>
        </div>
      </div>
      <!-- /.col-->
    </div>
    @include('dashboard.categories.category-js')
  </x-main>
