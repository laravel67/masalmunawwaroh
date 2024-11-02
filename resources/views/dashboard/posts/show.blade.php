<x-main>
    <div class="card card-widget">
        <div class="card-header">
          <div class="user-block">
            @if ($post->author->image)
                <img class="img-circle" src="{{ asset('storage/'.$post->author->image) }}" alt="User Image">
            @else
                <img class="img-circle" src="{{ asset('mas/img/foto-guru.png') }}" alt="User Image">
            @endif
            <span class="username">{{ $post->author->name }}</span>
            <span class="description">diposting {{ \Carbon\Carbon::parse($post->created_at)->locale('id')->translatedFormat('d F
                    Y')}}</span>
          </div>
          <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
          </div>
        </div>
        <div class="card-body" style="display: block;">
            <img class="attachment-img" src="{{ $post->image ?  asset('storage/'.$post->image) : 'https://placehold.jp/600x400.png' }}" alt="{{ $post->image }}">
            <h3 class="text-success">{{ $post->title }}</h3>
            <div class="row">
                <div class="col-md-7">
                    <article>
                        {!! $post->body !!}
                    </article>
                    <button type="button" disabled class="btn btn-default btn-sm my-1"><i class="fas fa-tag"></i> {{ $post->category->name }}</button>
                </div>
            </div>
        </div>
        <div class="card-footer card-comments" style="display: block;">
          <div class="card-comment">
            <div class="comment-text">
                <x-btn-back/>
                <x-btn-link title="Ubah" color="warning" href="{{ route('apost.edit', $post->slug) }}" icon="edit"/>
            </div>
          </div>
        </div>
      </div>
</x-main>