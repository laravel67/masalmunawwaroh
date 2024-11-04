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
                <form action="{{ route('acara.update', $agenda->slug) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                  @csrf
                  <x-input type="text" title="Nama Agenda/Acara" name="name" value="{{ old('name', $agenda->name) }}" />
                  <x-input type="text" title="Slug Agenda/Acara" name="slug" value="{{ old('slug', $agenda->slug) }}" readonly />
                  <x-input type="text" title="Tempat" name="tempat" value="{{ old('tempat', $agenda->tempat) }}" />
                  <x-input type="datetime-local" title="Tanggal dan Waktu" name="waktu" value="{{ old('waktu', $agenda->waktu) }}" />
                  <x-input-select title="Kategori" name="category" :selected="old('category', $agenda->category)" :defaultOptions="[['value' => 'Acara', 'label' => 'Acara'], ['value' => 'Agenda', 'label' => 'Agenda']]" />
                  <x-input-text-area width="200" name="body" value="{{ old('body', $agenda->body) }}" title="Isi Kegiatan"/>
                  <x-input type="file" title="Image/Gambar" name="image"  onchange="previewImage()" accept="image/*"/>
                  <x-btn-form/> 
                  <img id="previewContainer" class="mt-3 img-fluid" width="300">
                    @if ($agenda->image)
                        <img id="previewContainer" src="{{ asset('storage/'.$agenda->image) }}" class="mt-3 img-fluid"
                            width="300">
                        @endif
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