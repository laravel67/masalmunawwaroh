<x-main>
  <div class="row">
      <div class="col-12">
          <div class="card card-outline card-info">
              <div class="card-header">
                  <h1 class="card-title">
                      {{ __('Perbarui Visi & Misi Madrasah') }}
                  </h1>
              </div>
              <div class="card-body">
                  <form method="POST" action="{{ route('visimisi.update') }}">
                      @csrf
                      <x-input-text-area 
                          title="Visi & Misi" 
                          name="visimisi" 
                          width="200" 
                          value="{!! old('visimisi', $visimisi) !!}" 
                      />
                      <x-btn-form/>
                  </form>
              </div>
          </div>
      </div>
  </div>
</x-main>
