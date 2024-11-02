@props(['title'=>''])
<div  class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px; visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
    <h1 class="display-6 mb-3">{{ $title }}</h1>
    <p class="mb-5">
        {{ $slot }}
    </p>
</div>