<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img src="{{ asset('logoalm.png') }}" alt="SIMADAL" class="brand-image img-circle">
      <span class="brand-text font-weight-light">{{ __('SIMADAL') }}</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset( Auth::user()->image ? 'storage/' . Auth::user()->image : 'mas/img/foto-guru.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('user.profile') }}" class="d-block">
            {{ Auth::user()->name }}
          </a>
        </div>
      </div>
      <nav class="mt-2">
        <x-asideMenu/>
      </nav>
    </div>
  </aside>