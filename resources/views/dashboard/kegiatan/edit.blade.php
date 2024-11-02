<x-main>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-info">
          <div class="card-header">
            <h3 class="card-title">
              {{ __('Ubah kegiatan') }}
            </h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <form action="{{ route('akegiatan.update', $kegiatan->id) }}" method="POST" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf
                  <x-input type="text" title="Nama Kegiatan" name="name" value="{{ old('name', $kegiatan->name) }}" />
                  <x-input-text-area width="400" name="body" value="{!! old('body', $kegiatan->body) !!}" title="Isi Kegiatan"/>
                    <x-btn-form/>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.col-->
    </div>
  </x-main>