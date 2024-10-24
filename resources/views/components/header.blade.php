<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">

        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('img/smk_logo.png') }}" alt="Logo" class="logo-img">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <!-- Home Menu -->
                <li class="nav-item {{ Request::is('beranda') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/beranda') }}">Beranda</a>
                </li>
                <!-- Dropdown profile Menu -->
                <li class="nav-item dropdown {{ Request::is('profile/*') || Request::is('profile/') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button">
                        Profile
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item {{ Request::is('profile/visi') ? 'active' : '' }}"
                            href="{{ url('/profile/visi') }}">Visi Dan Misi</a>
                        <a class="dropdown-item {{ Request::is('profile/sambutan') ? 'active' : '' }}"
                            href="{{ url('/profile/sambutan') }}">Sambutan</a>
                        <a class="dropdown-item {{ Request::is('profile/staff') ? 'active' : '' }}"
                            href="{{ url('/profile/staff') }}">Data Pegawai</a>
                    </div>
                </li>
                <li class="nav-item {{ Request::is('berita') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/berita') }}">Berita</a>
                </li>
                <!-- Dropdown Ekskul -->
                <li class="nav-item dropdown {{ Request::is('ekskul/*') || Request::is('ekskul/') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#" id="ekskulDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Ekskul
                    </a>
                    <div class="dropdown-menu" aria-labelledby="ekskulDropdown">
                        @foreach ($ekskuls as $ekskul)
                            <a class="dropdown-item {{ Request::is('ekskul/' . $ekskul->id) ? 'active' : '' }}"
                                href="{{ url('/ekskul/' . $ekskul->id) }}">{{ $ekskul->judul }}</a>
                        @endforeach
                    </div>
                </li>

                <!-- Dropdown Jurusan -->
                <li
                    class="nav-item dropdown {{ Request::is('jurusan/*') || Request::is('jurusan/') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#" id="jurusanDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Jurusan
                    </a>
                    <div class="dropdown-menu" aria-labelledby="jurusanDropdown">
                        @foreach ($jurusans as $jurusan)
                            <a class="dropdown-item {{ Request::is('jurusan/' . $jurusan->id) ? 'active' : '' }}"
                                href="{{ url('/jurusan/' . $jurusan->id) }}">{{ $jurusan->nama }}</a>
                        @endforeach
                    </div>
                </li>
                <li
                    class="nav-item dropdown {{ Request::is('informasi/*') || Request::is('informasi') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button">
                        Informasi
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item {{ Request::is('informasi/agenda') ? 'active' : '' }}"
                            href="{{ url('/informasi/agenda') }}">Agenda</a>
                        <a class="dropdown-item {{ Request::is('informasi/alumni') ? 'active' : '' }}"
                            href="{{ url('/informasi/alumni') }}">Alumni</a>
                        <a class="dropdown-item {{ Request::is('informasi/download') ? 'active' : '' }}"
                            href="{{ url('/informasi/download') }}">Download</a>
                        <a class="dropdown-item {{ Request::is('informasi/infografis') ? 'active' : '' }}"
                            href="{{ url('/informasi/infografis') }}">Infografis</a>
                        <a class="dropdown-item {{ Request::is('informasi/pengumuman') ? 'active' : '' }}"
                            href="{{ url('/informasi/pengumuman') }}">Pengumuman</a>
                        <a class="dropdown-item {{ Request::is('informasi/prestasi') ? 'active' : '' }}"
                            href="{{ url('/informasi/prestasi') }}">Prestasi</a>
                    </div>
                </li>
                <li class="nav-item dropdown {{ Request::is('galeri/*') || Request::is('galeri') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button">
                        Galeri
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item {{ Request::is('galeri/foto') ? 'active' : '' }}"
                            href="{{ url('/galeri/foto') }}">Foto</a>
                        <a class="dropdown-item {{ Request::is('galeri/video') ? 'active' : '' }}"
                            href="{{ url('/galeri/video') }}">Video</a>
                    </div>
                </li>
                <li class="nav-item dropdown {{ Request::is('ppdb/*') || Request::is('ppdb') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button">
                        PPDB
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item {{ Request::is('ppdb/alur') ? 'active' : '' }}"
                            href="{{ url('/ppdb/alur') }}">Alur PPDB</a>
                        <a class="dropdown-item {{ Request::is('ppdb/brosur') ? 'active' : '' }}"
                            href="{{ url('/ppdb/brosur') }}">Brosur PPDB</a>
                        <a class="dropdown-item {{ Request::is('ppdb/kuota') ? 'active' : '' }}"
                            href="{{ url('/ppdb/kuota') }}">Kuota PPDB</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
