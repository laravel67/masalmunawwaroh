<x-main>
    <div class="row">
        <div class="col-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h1 class="card-title">
                {{ __('Perbarui Mars Madrasah') }}
              </h1>
            </div>
            <div class="card-body table-responsive">
              <form method="POST" action="{{ route('mars.update') }}">
                @csrf
                <x-input-text-area 
                    title="Mars Madrasah" 
                    name="mars" 
                    width="200" 
                    value="{!! old('mars', $mars) !!}" 
                />
                <x-btn-form/>
            </form>
            </div>
          </div>
        </div>
    </div>
</x-main>