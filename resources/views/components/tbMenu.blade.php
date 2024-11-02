<div class="navbar-nav">
    <a href="/" class="nav-item nav-link text-uppercase">{{ __('Beranda') }}</a>
    <x-tbSubLink title="Profile Madrasah" :active="Request::is('profile*')">
        <x-tbLink title="Sambutan" href="{{ route('sambutan') }}" :active="Request::is('profile/sambutan*')"/>
        <x-tbLink title="Sejarah" href="{{ route('sejarah') }}" :active="Request::is('profile/sejarah*')"/>
        <x-tbLink title="Identitas" href="{{ route('identitas') }}" :active="Request::is('profile/identitas*')" />
        <x-tbLink title="Struktur Organisasi" href="{{ route('struktur') }}" :active="Request::is('profile/struktur-organisasi*')"/>
        <x-tbLink title="Visi & Misi" href="{{ route('visi') }}" :active="Request::is('profile/visi-misi*')"/>
    </x-tbSubLink>
    <a href="{{ route('posts') }}" class="nav-item nav-link text-uppercase">{{ __('Berita') }}</a>
    <x-tbSubLink title="Akademik" :active="Request::is('akademik*')">
        <x-tbLink title="Program Unggulan" href="{{ route('pronggul') }}" :active="Request::is('akademik/program-unggulan*')"/>
        <x-tbLink title="Sarana Prasarana" href="{{ route('sarana') }}" :active="Request::is('akedemik/sambutan*')"/>
        <x-tbLink title="Kurikulum Madrasah" href="{{ route('kurikulum') }}" :active="Request::is('akedemik/sejarah*')"/>
        <x-tbLink title="Prestasi" href="{{ route('prestasi.aliyah') }}" :active="Request::is('akedemik/identitas*')" />
        <x-tbLink title="Biografi Guru" href="{{ route('biografi') }}" :active="Request::is('akedemik/struktur_organisasi*')"/>
    </x-tbSubLink>
    <x-tbSubLink title="Kesiswaan" :active="Request::is('profile*')">
        <x-tbLink title="Ekstrakulikuler" href="{{ route('sambutan') }}" :active="Request::is('profile/sambutan*')"/>
        <x-tbLink title="Organisasi Siswa" href="{{ route('sejarah') }}" :active="Request::is('profile/sejarah*')"/>
        <x-tbLink title="Kegiatan Siswa" href="{{ route('identitas') }}" :active="Request::is('profile/identitas*')" />
        <x-tbLink title="Galeri/Album" href="{{ route('struktur') }}" :active="Request::is('profile/struktur-organisasi*')"/>
    </x-tbSubLink>
    <x-tbSubLink title="Informasi Publik" :active="Request::is('profile*')">
        <x-tbLink title="Tentang" href="{{ route('sambutan') }}" :active="Request::is('profile/sambutan*')"/>
        <x-tbLink title="Agenda" href="{{ route('sejarah') }}" :active="Request::is('profile/sejarah*')"/>
        <x-tbLink title="Arsip" href="{{ route('identitas') }}" :active="Request::is('profile/identitas*')" />
        <x-tbLink title="Pengumuman" href="{{ route('identitas') }}" :active="Request::is('profile/identitas*')" />
    </x-tbSubLink>
</div>