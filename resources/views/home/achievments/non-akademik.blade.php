<x-content>
    <x-profile-header />
    <div class="row justify-content-around" data-aos="fade-up" data-aos-duration="500">
        @forelse ($posts as $i => $post)
            <div class="col-md-6">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            @if ($post->image)
                                <img data-aos="zoom-in" data-aos-duration="5000" src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->image }}" class="img-fluid">
                            @else
                                <svg data-aos="zoom-in" data-aos-duration="5000"
                                     class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                                     height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
                                     preserveAspectRatio="xMidYMid slice" focusable="false" style="overflow: hidden">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#eee"></rect>
                                    <text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text>
                                </svg>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title text-success">{{ $post->title }}</h5>
                                <p class="card-text">
                                    <small class="text-muted">
                                    <i class="fa-solid fa-calendar-days"></i>
                                    {{
                                    \Carbon\Carbon::parse($post->created_at)->locale('id')->translatedFormat('d F
                                    Y')}}
                                </small>
                                </p>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#deskripsi-{{ $i }}">Deskripsi</button>
                                <div class="modal fade" id="deskripsi-{{ $i }}" tabindex="-1" aria-labelledby="deskripsi-{{ $i }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                {!! $post->body !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col text-center">
                <img src="{{ asset('frontend/img/clipboard.png') }}" alt="No posts" class="img-fluid" width="400">
            </div>
        @endforelse
    </div>
    
</x-content>
