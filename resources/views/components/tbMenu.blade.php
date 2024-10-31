<ul class="navbar-nav">
    <li class="nav-item mx-lg-2 {{ Request::is('/*') ? 'active':'' }}">
        <a class="nav-link" href="{{ route('home') }}">{{ __('Beranda') }}</a>
    </li>
    <x-tbSubLink title="Profile" :active="Request::is('profile*')">
        <x-tbLink title="Sambutan" href="{{ route('sambutan') }}" :active="Request::is('profile/sambutan*')"/>
        <x-tbLink title="Sejarah" href="{{ route('sejarah') }}" :active="Request::is('profile/sejarah*')"/>
        <x-tbLink title="Identitas" href="{{ route('identitas') }}" :active="Request::is('profile/identitas*')" />
        <x-tbLink title="Struktur Organisasi" href="{{ route('struktur') }}" :active="Request::is('profile/struktur-organisasi*')"/>
        <x-tbLink title="Visi & Misi" href="{{ route('visi') }}" :active="Request::is('profile/visi-misi*')"/>
    </x-tbSubLink>
    <x-tbSubLink title="Program Unggulan">
        <x-tbLink title="Tahfidz Qur'an"/>
        <x-tbLink title="Pramuka"/>
    </x-tbSubLink>
    <x-tbSubLink title="Akademik">
        <x-tbLink title="Kurikulum"/>
        <x-tbLink title="Prestasi"/>
        <x-tbLink title="Sarana Prasarana"/>
        <x-tbLink title="Biografi Guru"/>
    </x-tbSubLink>
    <x-tbSubLink title="Kesiswaan">
        <x-tbLink title="Ekstra Kulikuler"/>
        <x-tbLink title="Organinasasi Santri"/>
        <x-tbLink title="Tata Tertib"/>
        <x-tbLink title="Album/Galeri"/>
    </x-tbSubLink>
    <x-tbSubLink title="Informasi">
        <x-tbLink title="Berita/Artikel"/>
        <x-tbLink title="Agenda"/>
        <x-tbLink title="Pengumuman"/>
    </x-tbSubLink>
    <li class="nav-item mx-lg-2 {{ Request::is('/*') ? 'active':'' }}">
        <a class="nav-link" href="{{ route('home') }}">{{ __('PSB') }}</a>
    </li>
</ul>