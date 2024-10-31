{{-- @push('css')
    <style>
     /* CSS Document */

marquee {
	margin-top: 5px;
	width: 100%;
}

.runtext-container {
background-color:#ddddff;
*background-color:#ccf;
background-image:-moz-linear-gradient(top,#ccf,#fff);
background-image:-webkit-gradient(linear,0 0,0 100%,from(#ccf),to(#fff));
background-image:-webkit-linear-gradient(top,#ccf,#fff);
background-image:-o-linear-gradient(top,#ccf,#fff);
background-image:linear-gradient(to bottom,#ccf,#fff);
background-repeat:repeat-x;
	border: 4px solid #000000;
	box-shadow:0 5px 20px rgba(0, 0, 0, 0.9);

width: 850px;
overflow-x: hidden;
overflow-y: visible;
margin: 0 60px 0 30px;
padding:0 3px 0 3px;
}

.main-runtext {margin: 0 auto;
overflow: visible;
position: relative;
height: 40px;
}

.runtext-container .holder {
position: relative;
overflow: visible;
display:inline;
float:left;

}

.runtext-container .holder .text-container {
	display:inline;
}

.runtext-container .holder a{
	text-decoration: none;
	font-weight: bold;
	color:#ff0000;
	text-shadow:0 -1px 0 rgba(0,0,0,0.25);
	line-height: -0.5em;
	font-size:16px;
}

.runtext-container .holder a:hover{
	text-decoration: none;
	color:#6600ff;
}
    </style>
@endpush
<header id="mainHead" class="navbar navbar-expand-lg navbar-dark bg-green " style="background-color: #25bb00;">
    <div class="runtext-container">
            <div class="main-runtext">
                <marquee direction="" onmouseover="this.stop();" onmouseout="this.start();">
                    <div class="holder">
                    
                        <div class="text-container">
                    &nbsp; &nbsp; <img src="http://jamaicaelectrician.org/images/icon.png"> &nbsp; <a data-fancybox-group="gallery" class="fancybox" href="images/runtext/Electric_Lighting_Act.jpg" title="THE ELECTRIC LIGHTING ACT: section 35">THE ELECTRIC LIGHTING ACT makes it mandatory to use the services of a Licensed Electrician</a>
                        </div>        
                    </div>
                </marquee>
            </div>
        </div>
    <div class="container d-md-block d-lg-block d-none">
        <div class="d-flex align-items-end">
            <div class="text-center mr-3">
                <img src="{{ asset('backend/img/logo-mas-almunawwaroh-removebg-preview.png') }}" alt="" class="img-fluid d-md-block d-none" width="150">
            </div>
            <div class="header-text">
                <h4 class="text-light d-md-block d-none text-uppercase">{{ __('Madrasah Aliyah') }}</h4>
                <h6 class="text-light d-md-block d-none"> {{ __("Pondok Pesantren Tahfidz Al-Qura'an Wal Hadits") }}</h4>
                <h4 class="text-light d-md-block d-none text-uppercase"> {{ __("Al-Munawwaroh Bangko") }}</h4>
                <a style="text-decoration: underline" href="https://maps.app.goo.gl/jE1X3XyyrWdyD2sV7" target="_blank"
                    class="text-light"><small>{{ __('Jl. Raya Lintas Utama Sumatera, Dusun Bangko, Kec. Bangko, Kabupaten Merangin, Jambi 37311') }}</small> </a>
            </div>
        </div>
    </div>
</header>
<nav id="mainNav" class="navbar navbar-expand-lg navbar-dark bg-green">
    <div class="container-lg">
        <a class="navbar-brand d-md-none" href="/"><span class="text-warning">MAS</span>{{ __(' AL-MUNAWWAROH') }}</a>
        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item mx-lg-3 {{ Request::is('/*') ? 'active':'' }}">
                    <a class="nav-link" href="{{ route('home') }}">{{ __('Beranda') }}</a>
                </li>
                <li
                    class="nav-item dropdown mx-lg-3 {{ Request::is('profile/sambutan*','profile/identitas*', 'profile/struktural*','profile/sejarah*', 'profile/visi-misi*') ? 'active':'' }}">
                    <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">{{ __('Profile') }}</a>
                    <div class="dropdown-menu bg-green">
                        <a class="dropdown-item text-light {{ Request::is('profile/sambutan*') ? 'bg-dark': '' }}"
                            href="{{ route('sambutan') }}">{{ __('Kata Sambutan') }}
                        </a>
                        <a class="dropdown-item text-light {{ Request::is('profile/identitas*') ? 'bg-dark': '' }}"
                            href="{{ route('identitas') }}">{{ __('Identitas') }}
                        </a>
                        <a class="dropdown-item text-light {{ Request::is('profile/struktural*') ? 'bg-dark': '' }}"
                            href="{{ route('struktur') }}">
                            {{ __('Struktur Organisasi') }}
                        </a>
                        <a class="dropdown-item text-light {{ Request::is('profile/sejarah*') ? 'bg-dark': '' }}"
                            href="{{ route('sejarah') }}">{{ __('Sejarah') }}
                        </a>
                        <a class="dropdown-item text-light {{ Request::is('profile/visi-misi*') ? 'bg-dark': '' }}"
                            href="{{ route('visi') }}">{{ __('Visi & Misi') }}
                        </a>
                    </div>
                </li>
                <li class="nav-item mx-lg-3 {{ Request::is('berita*') ? 'active':'' }}">
                    <a class="nav-link" href="{{ route('posts') }}">{{ __('Berita') }}</a>
                </li>
                <li
                    class="nav-item dropdown mx-lg-3 {{ Request::is('akademik/kurikulum*', 'akademik/sarana-prasarana*','akademik/biografi*') ? 'active':'' }}">
                    <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">{{ __('Akademik') }}</a>
                    <div class="dropdown-menu bg-green">
                        <a class="dropdown-item text-light {{ Request::is('akademik/kurikulum*') ? 'bg-dark': '' }}"
                            href="{{ route('kurikulum') }}">{{ __('Kurikulum') }}
                        </a>
                        <a class="dropdown-item text-light {{ Request::is('akademik/sarana-prasarana*') ? 'bg-dark': '' }}"
                            href="{{ route('sarana') }}">
                            {{ __('Sarana Prasarana') }}
                        </a>
                        <a class="dropdown-item text-light {{ Request::is('akademik/biografi') ? 'bg-dark': '' }}"
                            href="{{ route('biografi') }}">{{ __('Biografi Guru') }}
                        </a>
                    </div>
                </li>
                <li
                    class="nav-item dropdown mx-lg-3 {{ Request::is('prestasi/akademik*', 'prestasi/nonakademik*', 'prestasi/santri*') ? 'active':'' }}">
                    <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">{{ __('Prestasi') }}</a>
                    <div class="dropdown-menu bg-green">
                        <a class="dropdown-item text-light {{ Request::is('prestasi/akademik') ? 'bg-dark': '' }}"
                            href="{{ route('akademik') }}">{{ __('Akademik') }}
                        </a>
                        <a class="dropdown-item text-light {{ Request::is('prestasi/nonakademik') ? 'bg-dark': '' }}"
                            href="{{ route('nonakademik') }}">
                            {{ __('Non Akademik') }}
                        </a>
                        <a class="dropdown-item text-light {{ Request::is('prestasi/santri') ? 'bg-dark': '' }}"
                            href="{{ route('students.prestasi') }}">
                            {{ __('Prestasi Santri') }}
                        </a>
                    </div>
                </li>
                <li
                    class="nav-item dropdown mx-lg-3 {{ Request::is('kesiswaan/ekstrakulikuler*', 'kesiswaan/album*', 'kesiswaan/persada') ? 'active':'' }}">
                    <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">{{ __('Kesiswaan') }}</a>
                    <div class="dropdown-menu bg-green">
                        <a class="dropdown-item text-light {{ Request::is('kesiswaan/ekstrakulikuler*') ? 'bg-dark': '' }}"
                            href="{{ route('lifeskill') }}">
                            {{ __('Ekstra Kulikuler') }}
                        </a>
                        <a class="dropdown-item text-light {{ Request::is('kesiswaan/persada') ? 'bg-dark': '' }}"
                            href="{{ route('persada') }}">
                            {{ __('Organinasasi Santri') }}
                        </a>
                        <a class="dropdown-item text-light {{ Request::is('kesiswaan/album') ? 'bg-dark': '' }}"
                            href="{{ route('album') }}">
                            {{ __('Album') }}
                        </a>
                    </div>
                </li>
                <li class="nav-item mx-lg-3">
                    <a class="nav-link" href="{{ route('ppdb.home') }}">{{ __('PPDB') }}</a>
                </li>
                @can('admin')
                <li class="nav-item mx-lg-3">
                    <a class="nav-link" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                </li>
                @endcan
                @can('user')
                <li class="nav-item mx-lg-3">
                    <a class="nav-link" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                </li>
                @endcan
                @can('siswa')
                <li class="nav-item mx-lg-3">
                    <a class="nav-link" href="{{ route('ppdb.profile') }}">{{ __('Data Pendaftaran') }}</a>
                </li>
                @endcan
            </ul>
        </div>
    </div>
</nav>
<script>
    window.addEventListener('scroll', function() {
        var head = document.getElementById('mainHead');
        var nav = document.getElementById('mainNav');
        
        var headBounding = head.getBoundingClientRect();
        if (headBounding.bottom <= 0) {
            nav.classList.add('fixed-top');
        } else {
            nav.classList.remove('fixed-top');
        }
    });
</script> --}}