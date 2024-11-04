<div class="navbar-nav">
    <a href="/" class="nav-item nav-link text-uppercase {{ Request::is('/') ? 'text-success': '' }}">{{ __('Beranda') }}</a>
    <x-tbSubLink title="Profile Madrasah" :active="Request::is('profile*')">
        <x-tbLink title="Sambutan" href="{{ route('sambutan') }}" :active="Request::is('profile/sambutan*')"/>
        <x-tbLink title="Sejarah" href="{{ route('sejarah') }}" :active="Request::is('profile/sejarah*')"/>
        <x-tbLink title="Identitas" href="{{ route('identitas') }}" :active="Request::is('profile/identitas*')" />
        <x-tbLink title="Struktur Organisasi" href="{{ route('struktur') }}" :active="Request::is('profile/struktur-organisasi*')"/>
        <x-tbLink title="Visi & Misi" href="{{ route('visi') }}" :active="Request::is('profile/visi-misi*')"/>
    </x-tbSubLink>
    <a href="{{ route('posts') }}" class="nav-item nav-link text-uppercase {{ Request::is('berita*') ? 'text-success': '' }}">{{ __('Berita') }}</a>
    <x-tbSubLink title="Akademik" :active="Request::is('akademik*')">
        <x-tbLink title="Program Unggulan" href="{{ route('pronggul') }}" :active="Request::is('akademik/program-unggulan*')"/>
        <x-tbLink title="Sarana Prasarana" href="{{ route('sarana') }}" :active="Request::is('akademik/sarpras*')"/>
        <x-tbLink title="Kurikulum Madrasah" href="{{ route('kurikulum') }}" :active="Request::is('akademik/kurikulum*')"/>
        <x-tbLink title="Prestasi" href="{{ route('prestasi.aliyah') }}" :active="Request::is('akademik/daftar-prestasi*')" />
        <x-tbLink title="Biografi Guru" href="{{ route('biografi') }}" :active="Request::is('akademik/biografi*')"/>
        @guest
        <x-tbLink title="PPDB" href="{{ route('formulir.psb') }}"/>
        @endguest
    </x-tbSubLink>
    <x-tbSubLink title="Kesiswaan" :active="Request::is('kesiswaan*')">
        <x-tbLink title="Ekstrakulikuler" href="{{ route('ekskul') }}" :active="Request::is('kesiswaan/ekstrakulikuler*')"/>
        <x-tbLink title="Organisasi Siswa" href="{{ route('bems') }}" :active="Request::is('kesiswaan/bem*')"/>
        <x-tbLink title="Kegiatan Siswa" href="{{ route('kegiatan.siwa') }}" :active="Request::is('kesiswaan/kegiatan*')" />
        <x-tbLink title="Galeri/Album" href="{{ route('album') }}" :active="Request::is('kesiswaan/album*')"/>
        <x-tbLink title="Alumni" href="{{ route('alumnus') }}" :active="Request::is('kesiswaan/alumnus*')"/>
    </x-tbSubLink>
    <x-tbSubLink title="Informasi Publik" :active="Request::is('profile*')">
        <x-tbLink title="Kontak" href="{{ route('kontak') }}" :active="Request::is('informasi/kontak*')"/>
        <x-tbLink title="Agenda" href="{{ route('sejarah') }}" :active="Request::is('informasi/sejarah*')"/>
        <x-tbLink title="Arsip" href="{{ route('arsips') }}" :active="Request::is('informasi/arsips*')" />
        <x-tbLink title="Pengumuman" href="{{ route('identitas') }}" :active="Request::is('profile/identitas*')" />
    </x-tbSubLink>
</div>
