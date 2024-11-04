<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <x-link href="{{ route('dashboard') }}" icon="tachometer-alt" title="Dashboard" :active="request()->is('dashboard')"/>

    <x-asideSubMenu title="Berita/Artikel" icon="newspaper" :active="request()->is('dashboard/posts*','dashboard/categories*')">
        <x-linkSub title="Berita" href="{{ route('apost.index') }}" :active="request()->is('dashboard/posts*')" />
        <x-linkSub title="Kategori" href="{{ route('category.index') }}" :active="request()->is('dashboard/categories*')"/>
    </x-asideSubMenu>

    {{-- <x-asideSubMenu title="Master Data" icon="database" :active="request()->is('dashboard/masterdata*')">
        <x-linkSub title="Jabatan" href="{{ route('admin.jabatan') }}" :active="request()->is('dashboard/masterdata/jabatan*')" />
        <x-linkSub title="Mata Pelajaran" href="{{ route('admin.mapel') }}" :active="request()->is('dashboard/masterdata/mapel*')" />
    </x-asideSubMenu> --}}

    <x-asideSubMenu title="PPDB" icon="id-card" :active="request()->is('dashboard/ppdb*')">
        <x-linkSub title="Data PPDB" href="{{ route('appdb.index') }}" :active="request()->is('dashboard/ppdb/siswa-baru*')" />
        <x-linkSub title="Pengaturan PPDB" href="{{ route('set.reg') }}" :active="request()->is('dashboard/ppdb/pengaturan*')" />
    </x-asideSubMenu>

    <x-asideSubMenu title="Profile Madrasah" icon="school" :active="request()->is('dashboard/profile-madrasah*')">
        <x-linkSub title="Struktural" href="{{ route('profilemas.struktur') }}" :active="request()->is('dashboard/profile-madrasah/struktur*')" />
        <x-linkSub title="Sambutan" href="{{ route('profilemas.sambutan') }}" :active="request()->is('dashboard/profile-madrasah/sambutan*')" />
        <x-linkSub title="Visi & Misi" href="{{ route('profilemas.visimisi') }}" :active="request()->is('dashboard/profile-madrasah/visi-misi*')" />
        <x-linkSub title="Mars" href="{{ route('profilemas.mars') }}" :active="request()->is('dashboard/profile-madrasah/mars*')" />
    </x-asideSubMenu>
    <x-asideSubMenu title="Akademik" icon="book-reader" :active="request()->is('dashboard/akademik*')">
        <x-linkSub title="Data Guru" href="{{ route('guru.index') }}" :active="request()->is('dashboard/akademik/guru*')" />
        <x-linkSub title="Prestasi" href="{{ route('prestasi.index') }}" :active="request()->is('dashboard/akademik/prestasi*')" />
        <x-linkSub title="Sarana Prasarana" href="{{ route('asarana.index') }}" :active="request()->is('dashboard/akademik/sarana*')" />
        <x-linkSub title="Program Unggulan" href="{{ route('aprogram.index') }}" :active="request()->is('dashboard/akademik/programs*')" />
    </x-asideSubMenu>
    <x-asideSubMenu title="Kesiswaan" icon="user-tie" :active="request()->is('dashboard/kesiswaan*')">
        <x-linkSub title="Ekstrakulikuler" href="{{ route('ekskul.index') }}" :active="request()->is('dashboard/kesiswaan/ekstrakulikuler*')" />
        <x-linkSub title="Organisasi Santri" href="{{ route('bem.index') }}" :active="request()->is('dashboard/kesiswaan/bem*')" />
        <x-linkSub title="Tata Tertib" href="{{ route('asarana.index') }}" :active="request()->is('dashboard/kesiswaan/sarana*')" />
        <x-linkSub title="Kegiatan" href="{{ route('akegiatan.index') }}" :active="request()->is('dashboard/kesiswaan/kegiatan*')" />
        <x-linkSub title="Album/Galeri" href="{{ route('galeri.index') }}" :active="request()->is('dashboard/kesiswaan/album*')" />
    </x-asideSubMenu>

    <x-asideSubMenu title="Informasi" icon="bullhorn" :active="request()->is('dashboard/informasi*')">
        <x-linkSub title="Agenda/Acara" href="{{ route('guru.index') }}" :active="request()->is('dashboard/informasi/guru*')" />
        <x-linkSub title="Pengumuman" href="{{ route('prestasi.index') }}" :active="request()->is('dashboard/informasi/prestasi*')" />
        <x-linkSub title="Arsip" href="{{ route('data.arsip') }}" :active="request()->is('dashboard/informasi/arsips*')" />
    </x-asideSubMenu>
    {{-- <x-asideSubMenu title="Pengaturan" icon="cog" :active="request()->is('dashboard/informasi*')">
        <x-linkSub title="Slide/Corousal" href="{{ route('guru.index') }}" :active="request()->is('dashboard/informasi/guru*')" />
    </x-asideSubMenu> --}}
    <x-link onclick="logout()" icon="sign-out-alt" title="Keluar"/><x-logout/>
</ul>
