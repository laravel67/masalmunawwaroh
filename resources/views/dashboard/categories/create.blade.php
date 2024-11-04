<x-main>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-info">
          <div class="card-header">
            <h3 class="card-title">
              {{ __('Buat Kategori') }}
            </h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <x-input type="text" title="Nama Kategori" name="name" value="{{ old('name') }}" />
                  <x-input type="text" title="Slug Kategori" name="slug" value="{{ old('slug') }}" readonly/>
                  <x-btn-form/>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.col-->
    </div>
    @include('dashboard.categories.category-js')
  </x-main>