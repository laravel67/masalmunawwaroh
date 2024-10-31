<x-main>
    <div class="card card-widget">
        <div class="card-header">
          <div class="user-block">
            @if ($program->image)
                <img class="img-circle" src="{{ asset('storage/'.$program->image) }}" alt="User Image">
            @else
                <img class="img-circle" src="{{ asset('frontend/img/man-user.svg') }}" alt="User Image">
            @endif
            <span class="username"><a href="#">{{ $program->name }}</a></span>
            <span class="description">{{ \Carbon\Carbon::parse($program->created_at)->locale('id')->translatedFormat('d F
                    Y')}}</span>
          </div>
          <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
          </div>
        </div>
        <div class="card-body" style="display: block;">
            <img class="attachment-img" src="{{ asset('storage/'.$program->image) }}" alt="{{ $program->image }}">
            <div class="row">
                <div class="col-md-7">
                    <article>
                        {!! $program->body !!}
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
                <x-btn-link title="Ubah" color="warning" href="{{ route('aprogram.edit', $program->slug) }}" icon="edit"/>
            </div>
          </div>
        </div>
      </div>
</x-main>