<x-main>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-info">
          <div class="card-header">
            <h3 class="card-title">
              {{ __('Buat agenda/acara') }}
            </h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <form action="{{ route('acara.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <x-input type="text" title="Nama Agenda/Acara" name="name" value="{{ old('name') }}" />
                  <x-input type="text" title="Slug Agenda/Acara" name="slug" value="{{ old('slug') }}" readonly />
                  <x-input type="text" title="Tempat" name="tempat" value="{{ old('tempat') }}" />
                  <x-input type="datetime-local" title="Tanggal dan Waktu" name="waktu" value="{{ old('waktu') }}" />
                  <x-input-select title="Kategori" name="category" :defaultOptions="[['value' => 'Acara', 'label' => 'Acara'], ['value' => 'Agenda', 'label' => 'Agenda']]" />
                  <x-input-text-area width="200" name="body" value="{{ old('body') }}" title="Isi Kegiatan"/>
                  <x-input type="file" title="Image/Gambar" name="image"  onchange="previewImage()" accept="image/*"/>
                  <x-btn-form/> 
                  <img id="previewContainer" class="mt-3 img-fluid" width="300">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.col-->
    </div>
    @include('dashboard.agenda.js')
  </x-main>