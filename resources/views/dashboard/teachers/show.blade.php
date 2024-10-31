<x-main>
    <div class="card card-widget">
        <div class="card-header">
          <div class="user-block">
            <h2>{{ __('Data Lengkap') }}</h2>
          </div>
          <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
          </div>
        </div>
        <div class="card-body" style="display: block;">
            <div class="row">
                <div class="col-md-7">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center">
                            @if ($guru->image)
                            <img class=" img-fluid" src="{{ asset('storage/'.$guru->image)}}" alt="Generic placeholder image"
                                width="340" height="340">
                            @else
                            <img class=" img-fluid" src="{{ asset('frontend/img/man-user.svg')}}" alt="Generic placeholder image" width="340"
                                height="340">
                            @endif
                        </li>
                        <li class="list-group-item">
                            Nama Lengkap : <strong>{{ $guru->name }}</strong>
                        </li>
                        <li class="list-group-item">
                            Pendidikan Terahir : <strong>{{ $guru->pendidikan }}</strong>
                        </li>
                        <li class="list-group-item">
                            Guru Mapel :
                            @foreach ($guru->mapels as $mapel)
                            <strong class="badge bg-success text-light rounded-0">{{ $mapel->name }}</strong>
                            @endforeach
                        </li>
                        <li class="list-group-item">
                            Jabatan :
                            @foreach ($guru->jabatans as $jabatan)
                            <strong class="badge bg-danger text-light rounded-0">{{ $jabatan->name }}</strong>
                            @endforeach
                        </li>
                        <li class="list-group-item">
                            Mulai Mengajar : <strong>{{
                                \Carbon\Carbon::parse($guru->mulai_mengajar)->locale('id')->translatedFormat('d F
                                Y')}}</strong>
                        </li>
                        <li class="list-group-item">
                            <article>
                                {!! $guru->deskripsi !!}
                            </article>
                        </li>
                    </ul>
                </div>
                <x-image-draw/>
            </div>    
        </div>
        <div class="card-footer card-comments" style="display: block;">
          <div class="card-comment">
            <div class="comment-text">
                <x-btn-back/>
                <x-btn-link title="Ubah" color="warning" href="{{ route('guru.edit', $guru->slug) }}" icon="edit"/>
            </div>
          </div>
        </div>
      </div>
</x-main>
