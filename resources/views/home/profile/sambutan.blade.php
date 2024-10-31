
<x-content>
    <x-profile-header/>
    <div class="card mb-3" data-aos="fade-up" data-aos-duration="500">
        <div class="card-header text-center">
            @if ($sambutan ? $sambutan->image:'')
            <img src="{{ asset('storage/'.$sambutan->image) }}" width="350" class="img-fluid" data-aos="fade-up"
            data-aos-anchor-placement="bottom-bottom" data-aos-duration="1000">
            @endif
            <img src="{{ asset('frontend/img/man-user.svg') }}" width="350" class="img-fluid" data-aos="fade-up"
            data-aos-anchor-placement="bottom-bottom" data-aos-duration="1000">
        </div>
        <div class="card-body">
            <article align="justify" class="card-text blockquote">
                {!! $sambutan ? $sambutan->body:'' !!}
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. In, magnam unde numquam saepe nam odio. Esse, deleniti eveniet? Quo suscipit sit nesciunt. Enim numquam debitis explicabo accusantium est, voluptates incidunt praesentium omnis eos autem aspernatur quis velit sapiente corporis vero provident, accusamus iure dolor dicta suscipit placeat iusto nesciunt repellendus! Optio quas, nemo, quisquam itaque, accusamus reprehenderit labore explicabo illo officia eaque provident. Debitis saepe porro quidem quae ex earum fuga eligendi, nesciunt deserunt modi, doloremque reprehenderit odio iste dignissimos sapiente ab laudantium consectetur doloribus officia non perferendis ducimus? Vero corrupti similique, 
            </article>
            <p class="card-text">
                <small class="text-muted">
                    {{ \Carbon\Carbon::parse($sambutan ? $sambutan->updated_at:'')->translatedFormat('j F Y') }}
                </small>
            </p>
            
        </div>
    </div>
</x-content>