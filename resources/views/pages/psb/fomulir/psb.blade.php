<div class="card card-default">
    <div class="card-body p-5">
        @include('pages.form.tablist')
        <h3 class="text-center fw-bold">{{ $titleForm }}</h3>
        <div class="bs-stepper-content">
          <div class="text-center">
              <span class="loader " wire:loading wire:target="nextStep"></span>
          </div>            
          <form wire:submit='storeNewStudent'>
              @if ($step == 1)
                  @include('pages.form.step1')
              @elseif ($step == 2)
                  @include('pages.form.step2')
              @elseif ($step == 3)
                  @include('pages.form.step3')
              @elseif ($step == 4)
                  @include('pages.form.step4')
              @elseif ($step==5)
                  @include('pages.form.step5')
              @endif
          
              <div class="mt-4 d-flex col-12 justify-content-between">
                  @if ($step > 1)
                      <button class="btn btn-lg rounded-0 btn-secondary" type="button" wire:click="previousStep">{{ __('Kembali') }}</button>
                  @endif
          
                  @if ($step < 5)
                      <button class="btn btn-lg rounded-0 btn-info" type="button" wire:click="nextStep" wire:target="nextStep" wire:loading.attr="disabled">
                          {{__('Selanjutnya')}}
                      </button>
                  @else
                      <button class="btn btn-lg rounded-0 btn-success" type="submit" wire:target="storeNewStudent" wire:loading.attr="disabled">
                          Daftar Sekarang
                      </button>
                  @endif
              </div>
          </form>
          
        </div>
    </div>
 </div>
 