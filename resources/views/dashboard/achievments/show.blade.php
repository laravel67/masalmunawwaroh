<x-main>
    <div class="card card-widget">
        <div class="card-header">
          <div class="user-block">
            <h5 class="text-success my-0">{{ $prestasi->title }}</h5>
            <small class="text-muted">{{ \Carbon\Carbon::parse($prestasi->created_at)->locale('id')->translatedFormat('d F
                    Y')}}</small>
          </div>
          <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
          </div>
        </div>
        <div class="card-body" style="display: block;">
            <img class="attachment-img" src="{{ asset('storage/'.$prestasi->image) }}" alt="{{ $prestasi->image }}">
            <div class="row">
                <div class="col-md-7">
                    <article>
                        {!! $prestasi->body !!}
                    </article>
                </div>
                <x-image-draw/>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer card-comments" style="display: block;">
          <div class="card-comment">
            <div class="comment-text">
                <x-btn-back/>
                <x-btn-link title="Ubah" color="warning" href="{{ route('prestasi.edit', $prestasi->slug) }}" icon="edit"/>
            </div>
          </div>
        </div>
      </div>
</x-main>