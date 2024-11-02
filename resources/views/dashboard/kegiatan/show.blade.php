<x-main>
  <div class="card card-widget">
      <div class="card-header">
        <div class="user-block">
          <h3 class="text-success">{{ $kegiatan->name }}</h3>
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
                  <article>
                      {!! $kegiatan->body !!}
                  </article>
              </div>
          </div>
          <span class="description">{{ __('dibuat') }} {{ \Carbon\Carbon::parse($kegiatan->created_at)->locale('id')->translatedFormat('d F
                  Y')}}</span>
      </div>
      <div class="card-footer card-comments" style="display: block;">
        <div class="card-comment">
          <div class="comment-text">
              <x-btn-back/>
              <x-btn-link title="Ubah" color="warning" href="{{ route('akegiatan.edit', $kegiatan->id) }}" icon="edit"/>
          </div>
        </div>
      </div>
    </div>
</x-main>