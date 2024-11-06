<x-content>
    <div class="container my-5 col-md-6">
        @if ($visimisi)
        <article class="text-dark" style="line-height: 40px">
            {!! $visimisi->visimisi !!}
        </article>
        @else
        <p class="text-center">{{ __('Data belum dimuat') }}</p>
        @endif
    </div>
</x-content>