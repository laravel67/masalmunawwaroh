<div class="card card-default">
    <div class="card-body p-5">
        <h3 class="text-center fw-bold">{{ $titleForm }}</h3>
        <div class="bs-stepper-content">         
            @include('pages.psb.fomulir.tablist')
          <form wire:submit='storeNewStudent'>
              @if ($step == 1)
                  @include('pages.psb.fomulir.step1')
              @elseif ($step == 2)
                  @include('pages.psb.fomulir.step2')
              @elseif ($step == 3)
                  @include('pages.psb.fomulir.step3')
              @elseif ($step == 4)
                  @include('pages.psb.fomulir.step4')
              @elseif ($step==5)
                  @include('pages.psb.fomulir.step5')
              @endif
          
              <div class="mt-4 d-flex col-12 justify-content-between">
                  @if ($step > 1)
                      <button class="btn rounded-0 btn-secondary" type="button" wire:click="previousStep">{{ __('Kembali') }}</button>
                  @endif
          
                  @if ($step < 5)
                  <button class="btn rounded-0 btn-info" type="button" wire:click="nextStep" wire:target="nextStep" wire:loading.attr="disabled">
                    <span wire:loading.class="d-none" wire:target="nextStep">{{ __('Selanjutnya') }}</span>
                    <span wire:loading.class="d-inline-block" wire:target="nextStep" class="spinner-border spinner-border-sm ms-2 d-none" role="status" aria-hidden="true"></span>
                    <span wire:loading.class="d-inline-block" wire:target="nextStep" class="ms-1 d-none">Loading...</span>
                </button>
                
                  @else
                      <button class="btn rounded-0 btn-success" type="submit" wire:target="storeNewStudent" wire:loading.attr="disabled">
                          <span wire:loading.class="d-none" wire:target="storeNewStudent">{{ __('Kirim') }}</span>
                            <span wire:loading.class="d-inline-block" wire:target="storeNewStudent" class="spinner-border spinner-border-sm ms-2 d-none" role="status" aria-hidden="true"></span>
                            <span wire:loading.class="d-inline-block" wire:target="storeNewStudent" class="ms-1 d-none">Mengirim...</span>
                      </button>
                  @endif
              </div>
          </form>
          
        </div>
    </div>
 </div>
 