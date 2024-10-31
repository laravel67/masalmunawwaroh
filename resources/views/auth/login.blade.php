<x-authenticate>
    <form action="{{ route('login') }}" method="post" class="mb-5">
      @csrf
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Alamat Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control @error('email') is-invalid @enderror" placeholder="Kata Sandi">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <button type="submit" class="btn btn-success btn-block">{{ __('Masuk') }} <span class="fas fa-sign-in-alt"></span></button>
        <a href="/" class="btn btn-link">{{ __('Beranda') }}</a>
        <a href="/" class="btn btn-link">{{ __('RDM') }}</a>
      </form>
</x-authenticate>