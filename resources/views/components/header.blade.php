<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
        <img src="{{ asset('img/smk_logo.png') }}" alt="Logo" class="logo-img">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <!-- Home Menu -->
            <li class="nav-item  active">
                <a class="nav-link" href="{{ url('/') }}">Berana</a>
            </li>
            <!-- Dropdown Contact Menu -->
            <li class="nav-item dropdown {{ Request::is('contact/*') || Request::is('contact') ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button">
                    Profile
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item {{ Request::is('contact/email') ? 'active' : '' }}" href="{{ url('/contact/email') }}">Visi Dan Misi</a>
                    <a class="dropdown-item {{ Request::is('contact/phone') ? 'active' : '' }}" href="{{ url('/contact/phone') }}">Sambutan</a>
                    <a class="dropdown-item {{ Request::is('contact/phone') ? 'active' : '' }}" href="{{ url('/contact/phone') }}">Data Staff</a>
                </div>
            </li>
            <li class="nav-item  active">
                <a class="nav-link" href="{{ url('/') }}">Berita</a>
            </li>
            <li class="nav-item dropdown {{ Request::is('contact/*') || Request::is('contact') ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button">
                    Jurusan
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item {{ Request::is('contact/email') ? 'active' : '' }}" href="{{ url('/contact/email') }}">Teknik Komputer dan Jaringan</a>
                    <a class="dropdown-item {{ Request::is('contact/phone') ? 'active' : '' }}" href="{{ url('/contact/phone') }}">Tata Busana</a>
                    <a class="dropdown-item {{ Request::is('contact/phone') ? 'active' : '' }}" href="{{ url('/contact/phone') }}">Teknik Kendaraan Ringan</a>
                </div>
            </li>
            <li class="nav-item dropdown {{ Request::is('contact/*') || Request::is('contact') ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button">
                    Informasi
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item {{ Request::is('contact/email') ? 'active' : '' }}" href="{{ url('/contact/email') }}">Agenda</a>
                    <a class="dropdown-item {{ Request::is('contact/phone') ? 'active' : '' }}" href="{{ url('/contact/phone') }}">Alumni</a>
                    <a class="dropdown-item {{ Request::is('contact/phone') ? 'active' : '' }}" href="{{ url('/contact/phone') }}">Infografis</a>
                    <a class="dropdown-item {{ Request::is('contact/phone') ? 'active' : '' }}" href="{{ url('/contact/phone') }}">Pengumuman</a>
                    <a class="dropdown-item {{ Request::is('contact/phone') ? 'active' : '' }}" href="{{ url('/contact/phone') }}">Prestasi</a>
                </div>
            </li>
            <li class="nav-item dropdown {{ Request::is('contact/*') || Request::is('contact') ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button">
                    Galeri
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item {{ Request::is('contact/email') ? 'active' : '' }}" href="{{ url('/contact/email') }}">Foto</a>
                    <a class="dropdown-item {{ Request::is('contact/phone') ? 'active' : '' }}" href="{{ url('/contact/phone') }}">Video</a>
                </div>
            </li>
            <li class="nav-item  active">
                <a class="nav-link" href="{{ url('/') }}">Download</a>
            </li>
            <li class="nav-item dropdown {{ Request::is('contact/*') || Request::is('contact') ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button">
                    PPDB
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item {{ Request::is('contact/email') ? 'active' : '' }}" href="{{ url('/contact/email') }}">Alur PPDB</a>
                    <a class="dropdown-item {{ Request::is('contact/phone') ? 'active' : '' }}" href="{{ url('/contact/phone') }}">Brosur PPDB</a>
                    <a class="dropdown-item {{ Request::is('contact/phone') ? 'active' : '' }}" href="{{ url('/contact/phone') }}">Kuota PPDB</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
