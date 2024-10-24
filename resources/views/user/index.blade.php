@extends('layouts.app')

@section('title', 'Beranda')

@push('style')
@endpush

@section('main')
    <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($hero as $key => $item)
                <li data-target="#carouselExampleIndicators3" data-slide-to="{{ $key }}"
                    class="{{ $key === 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($hero as $key => $item)
                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                    <img class="d-block w-100" src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->alt_text }}">
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container">
        <div class="main-content">
            {{-- <div class="section"> --}}
            <div class="card shadow-sm">
                <div class="card-body">
                    <ul class="nav nav-pills custom-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="visimisi-tab" data-toggle="tab" href="#visimisi" role="tab"
                                aria-controls="visimisi" aria-selected="true">
                                <i class="fa-solid fa-tv"></i> Visi Misi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="sambutan-tab" data-toggle="tab" href="#sambutan" role="tab"
                                aria-controls="sambutan" aria-selected="false">
                                <i class="fa-solid fa-volume-high"></i> Sambutan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pengumuman-tab" data-toggle="tab" href="#pengumuman" role="tab"
                                aria-controls="pengumuman" aria-selected="false">
                                <i class="fa-solid fa-bullhorn"></i> Pengumuman
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="agenda-tab" data-toggle="tab" href="#agenda" role="tab"
                                aria-controls="agenda" aria-selected="false">
                                <i class="fa-solid fa-calendar-days"></i> Agenda
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="infografis-tab" data-toggle="tab" href="#infografis" role="tab"
                                aria-controls="infografis" aria-selected="false">
                                <i class="fa-regular fa-image"></i> Infografis
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="video-tab" data-toggle="tab" href="#video" role="tab"
                                aria-controls="video" aria-selected="false">
                                <i class="fa-brands fa-youtube"></i> Video
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="visimisi" role="tabpanel"
                            aria-labelledby="visimisi-tab">
                            <h3 class="text-center my-4">
                                <span class="border-bottom border-primary">Visi dan Misi</span>
                            </h3>
                            <div class="row gy-4 pb-3">
                                <div class="col-lg-9 order-2 order-lg-1 aos-init aos-animate" data-aos="fade-up"
                                    data-aos-delay="100">
                                    <h3>Visi SMKN 1 Way Bungur</h3>
                                    <p class="fst-italic">
                                        <span lang="EN-GB"
                                            style="font-size:12.0pt;font-family: 'Times New Roman', serif;">
                                            {!! html_entity_decode($visi->deskripsi) !!}
                                        </span>
                                    </p>
                                    <h3>Misi Layanan</h3>
                                    <p>
                                        {!! html_entity_decode($misi->deskripsi) !!}
                                    </p>
                                </div>
                                <div class="col-lg-3 order-1 order-lg-2 text-center aos-init aos-animate"
                                    data-aos="fade-up" data-aos-delay="200">
                                    <img src="https://smkn4-bdl.sch.id/public/img/section/1705899671_fdc4b6337eff3d31abad.png"
                                        alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="sambutan" role="tabpanel" aria-labelledby="sambutan-tab">
                            <h3 class="text-center my-4">
                                <span class="border-bottom border-primary">Sambutan Kepala Sekolah</span>
                            </h3>
                            <div class="row gy-4 pb-3">
                                <!-- Kolom Teks Sambutan -->
                                <div class="col-lg-9 order-2 order-lg-1 aos-init aos-animate" data-aos="fade-up"
                                    data-aos-delay="100">
                                    <!-- Tampilkan konten sambutan dari database menggunakan Summernote -->
                                    <p>{!! $sambutan->deskripsi !!}</p>
                                </div>
                                <!-- Kolom Gambar Kepala Sekolah -->
                                <div class="col-lg-3 order-1 order-lg-2 text-center aos-init aos-animate"
                                    data-aos="fade-up" data-aos-delay="200">
                                    <img src="{{ asset('storage/' . $sambutan->foto) }}" alt="Kepala Sekolah"
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pengumuman" role="tabpanel" aria-labelledby="pengumuman-tab">
                            <h3 class="text-center my-4">
                                <span class="border-bottom border-primary">Pengumuman</span>
                            </h3>
                            <div class="row gy-4 pb-4">
                                <div class="col-md-9">
                                    <div class="row">
                                        @foreach ($pengumumans as $item)
                                            <!-- Button triggering the modal -->
                                            <div class="col-12 mb-3">
                                                <button type="button" class="btn btn-light btn-block"
                                                    data-toggle="modal" data-target="#pengumumanModal{{ $item->id }}">
                                                    <div class="d-flex align-items-center">
                                                        <div class="mr-3">
                                                            <i class="fas fa-bullhorn display-10"></i>
                                                            <!-- Bullhorn icon size increased to fa-5x -->
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <!-- Make title and date left-aligned -->
                                                            <div class="text-left">
                                                                <div class="font-weight-bold h5 mb-1">{{ $item->judul }}
                                                                </div> <!-- Title -->
                                                                <div class="text-muted small">
                                                                    <i class="fas fa-calendar-alt"></i>
                                                                    {{ $item->created_at->format('d F Y') }}
                                                                    <!-- Date below the title, aligned to the left -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </button>
                                            </div>

                                            <!-- Modal -->
                                            <div class="modal fade" id="pengumumanModal{{ $item->id }}"
                                                tabindex="-1" role="dialog"
                                                aria-labelledby="pengumumanModalLabel{{ $item->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="pengumumanModalLabel{{ $item->id }}">
                                                                {{ $item->judul }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="text-muted small mb-2">
                                                                <i class="fas fa-calendar-alt"></i>
                                                                {{ $item->created_at->format('d F Y') }}
                                                            </div>
                                                            <p>{!! html_entity_decode($item->deskripsi) !!}</p>
                                                            <!-- Display the description or any content you want -->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-3 order-1 order-lg-2 text-center aos-init aos-animate"
                                    data-aos="fade-up" data-aos-delay="200">
                                    <img src="https://smkn4-bdl.sch.id/public/template/frontend/herobiz/desktop/assets/img/pengumuman.png"
                                        alt="" class="img-fluid">
                                </div>
                            </div>
                            <div class="text-center">
                                <a class="btn btn-primary" href="{{ url('/pengumuman') }}"
                                    style="background-color: blue; border-color: blue;">
                                    Lihat Semua
                                </a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="agenda" role="tabpanel" aria-labelledby="agenda-tab">
                            <h3 class="text-center my-4">
                                <span class="border-bottom border-primary">Agenda</span>
                            </h3>
                            <div class="row gy-4 pb-4">
                                <div class="col-md-9">
                                    <div class="row">
                                        @foreach ($agenda as $item)
                                            <!-- Button triggering the modal -->
                                            <div class="col-12 mb-3">
                                                <button type="button" class="btn btn-light btn-block"
                                                    data-toggle="modal" data-target="#agendaModal{{ $item->id }}">
                                                    <div class="d-flex align-items-center">
                                                        <div class="mr-3">
                                                            <i class="fas fa-bullhorn display-10"></i>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <div class="text-left">
                                                                <div class="font-weight-bold h5 mb-1">{{ $item->judul }}
                                                                </div> <!-- Title -->
                                                                <div class="text-muted small">
                                                                    <i class="fas fa-calendar-alt"></i>
                                                                    {{ $item->created_at->format('d F Y') }}
                                                                    <!-- Date below the title -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </button>
                                            </div>

                                            <!-- Modal -->
                                            <div class="modal fade" id="agendaModal{{ $item->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="agendaModalLabel{{ $item->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="agendaModalLabel{{ $item->id }}">
                                                                {{ $item->judul }}
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body"
                                                            style="max-height: 400px; overflow-y: auto;">
                                                            <div class="text-muted small mb-2">
                                                                <i class="fas fa-calendar-alt"></i>
                                                                {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d F Y') }}
                                                                -
                                                                {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d F Y') }}
                                                                <br>
                                                                <i class="fas fa-clock"></i>
                                                                {{ \Carbon\Carbon::parse($item->jam_pelaksanaan)->format('H:i') }}
                                                            </div>
                                                            @if ($item->image)
                                                                <img src="{{ asset('storage/' . $item->image) }}"
                                                                    class="img-fluid mb-2" alt="{{ $item->judul }}"
                                                                    onerror="this.onerror=null; this.src='path/to/default-image.jpg';">
                                                            @endif
                                                            <p>{!! html_entity_decode($item->deskripsi) !!}</p>
                                                            <strong>Organizer:</strong>
                                                            <div class="text-muted">{{ $item->penyelenggara }}</div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-3 order-1 order-lg-2 text-center aos-init aos-animate"
                                    data-aos="fade-up" data-aos-delay="200">
                                    <img src="https://smkn4-bdl.sch.id/public/template/frontend/herobiz/desktop/assets/img/pengumuman.png"
                                        alt="" class="img-fluid">
                                </div>
                            </div>
                            <div class="text-center">
                                <a class="btn btn-primary" href="{{ url('/agenda') }}"
                                    style="background-color: blue; border-color: blue;">
                                    Lihat Semua
                                </a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="infografis" role="tabpanel" aria-labelledby="infografis-tab">
                            <h3 class="text-center my-4">
                                <span class="border-bottom border-primary">Infografis</span>
                            </h3>
                            <div class="row justify-content-center g-4">
                                @foreach ($infografis as $item)
                                    <div class="col-xl-4 col-md-6">
                                        <button type="button" class="btn" data-toggle="modal"
                                            data-target="#infografisModal{{ $item->id }}">
                                            <div class="card aos-init aos-animate" data-aos="zoom-in"
                                                data-aos-delay="200">
                                                <div class="card-body text-center">
                                                    @if ($item->image)
                                                        <img src="{{ asset('storage/' . $item->image) }}"
                                                            alt="{{ $item->judul }}" class="img-fluid w-100"
                                                            style="height: 450px; object-fit: cover;">
                                                    @else
                                                        <div class="text-center py-5 bg-light" style="height: 450px;">No
                                                            Image
                                                        </div>
                                                    @endif
                                                    <div class="mt-3">
                                                        <h5 class="card-title">{{ $item->judul }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="infografisModal{{ $item->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="infografisModalLabel{{ $item->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="infografisModalLabel{{ $item->id }}">
                                                        {{ $item->judul }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="max-height: 60vh; overflow-y: auto;">
                                                    @if ($item->image)
                                                        <img src="{{ asset('storage/' . $item->image) }}"
                                                            alt="{{ $item->judul }}" class="img-fluid w-100"
                                                            style="height: auto; object-fit: cover;">
                                                    @else
                                                        <div class="text-center py-5 bg-light" style="height: 400px;">No
                                                            Image
                                                        </div>
                                                    @endif
                                                    <!-- Add any additional content here if needed -->
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="row mt-5">
                                <div class="col-md-12 text-center">
                                    <a href="{{ url('/infografis') }}" class="btn btn-primary">
                                        Lihat Semua Infografis <i class="mdi mdi-arrow-right ml-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="video-tab">
                            <h3 class="text-center my-4">
                                <span class="border-bottom border-primary">Video</span>
                            </h3>
                            <div class="row justify-content-center g-4">
                                <!-- Video Section -->
                                <div class="col-md-8">
                                    <div class="tab-content">
                                        @foreach ($videos as $video)
                                            <!-- Dynamic Tab Content for each video -->
                                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                                id="video{{ $video->id }}" role="tabpanel"
                                                aria-labelledby="video-tab{{ $video->id }}">
                                                <div class="embed-responsive embed-responsive-16by9 mb-4">
                                                    <iframe class="embed-responsive-item"
                                                        src="https://www.youtube.com/embed/{{ $video->url }}"
                                                        allowfullscreen></iframe>
                                                </div>
                                                <p>{{ $video->judul }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <ul class="nav nav-pills flex-column text-left" id="myTab4" role="tablist">
                                        @foreach ($videos as $video)
                                            <li class="nav-item mb-2 shadow-sm">
                                                <a class="nav-link {{ $loop->first ? 'active' : '' }} d-flex justify-content-start align-items-center"
                                                    id="video-tab{{ $video->id }}" data-toggle="tab"
                                                    href="#video{{ $video->id }}" role="tab"
                                                    aria-controls="video{{ $video->id }}"
                                                    aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                                                    aria-label="Play video: {{ $video->judul }}"
                                                    style="font-size: 1rem; padding: 0.75rem 1rem;">
                                                    <i class="fas fa-play-circle mr-2" style="font-size: 1.25rem;"></i>
                                                    <span class="d-none d-md-inline">{{ $video->judul }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- Button Section -->
                            <div class="text-center mt-4">
                                <a class="btn btn-primary btn-lg shadow-sm" href="{{ url('/video') }}" role="button">
                                    Semua Video
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-5 shadow-sm">
                <h3 class="text-center my-4 text-dark "><span class="border-bottom border-primary">
                        Prestasi Siswa</span></h3>
                <div class="card-body">
                    @if ($penghargaan->isEmpty())
                        <p class="text-center">Tidak ada data Prestasi tersedia.</p>
                    @else
                        <div class="row justify-content-center g-4">
                            @foreach ($penghargaan as $item)
                                <div class="col-md-4 mb-4">
                                    <div class="card shadow d-flex flex-column align-items-center" style="width: 100%;">
                                        <div class="card-body d-flex flex-column align-items-center text-center px-4">
                                            @if ($item->image)
                                                <img src="{{ asset('storage/' . $item->image) }}"
                                                    alt="Profile picture of {{ $item->judul }}" class="img-fluid"
                                                    style="object-fit: cover; width: 100%; height: 200px;">
                                            @else
                                                <img src="{{ asset('path/to/placeholder-image.png') }}" alt="No Image"
                                                    class="img-fluid"
                                                    style="object-fit: cover; width: 100%; height: 200px;">
                                            @endif
                                            <h4 class="mb-1">{{ $item->judul }}</h4>
                                            <p class="mb-2">{!! html_entity_decode(Str::limit($item->deskripsi, 15)) !!}</p>
                                            <div class="mt-2">
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#modalPrestasi{{ $item->id }}">
                                                    Lihat Detail
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="modalPrestasi{{ $item->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="modalPrestasiLabel{{ $item->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalPrestasiLabel{{ $item->id }}">
                                                    {{ $item->judul }}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
                                                <img src="{{ asset('storage/' . $item->image) }}"
                                                    alt="{{ $item->judul }}" class="img-fluid mb-3">
                                                <p>{!! html_entity_decode($item->deskripsi) !!}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="text-center mt-2 mb-5">
                            <a class="btn btn-primary btn-lg shadow-sm" href="{{ url('/staff') }}">Semua Pegawai</a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card mt-5 shadow-sm">
                <h3 class="text-center my-4 text-dark">
                    <span class="border-bottom border-primary">Berita Sekolah</span>
                </h3>
                <div class="card-body">
                    @if ($berita->isEmpty())
                        <p class="text-center">Tidak ada berita tersedia.</p>
                    @else
                        <div class="row justify-content-center g-4">
                            @foreach ($berita as $item)
                                <div class="col-12 col-sm-6 col-md-4 mb-4">
                                    <div class="card shadow-sm d-flex flex-column align-items-cente"
                                        style="min-height: 400px;">
                                        @if ($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->judul }}"
                                                class="img-fluid w-100" style="height: 200px; object-fit: cover;">
                                        @else
                                            <div class="text-center py-5 bg-light" style="height: 200px;">No Image
                                            </div>
                                        @endif
                                        <div class="card-body" style="height: calc(100% - 200px);">
                                            <div>
                                                <div class="d-flex justify-content-between mb-2">
                                                    <span
                                                        class="badge badge-primary small">{{ $item->kategoriBerita->nama }}</span>
                                                </div>
                                                <h4 class="mb-1">{{ Str::limit($item->judul, 15) }}</h4>
                                                <p class="mb-2">{!! html_entity_decode(Str::limit($item->deskripsi, 20)) !!}</p>
                                            </div>
                                            <div class="mt-auto">
                                                <div class="d-flex justify-content-between align-items-center mb-1">
                                                    <span class="d-flex align-items-center">
                                                        <i class="fas fa-calendar-alt mr-1"></i>
                                                        <small
                                                            class="font-weight-bold">{{ $item->created_at ? $item->created_at->format('d M Y') : 'Date Not Available' }}</small>
                                                    </span>
                                                    <span class="mx-2">||</span> <!-- Separator -->
                                                    <span class="d-flex align-items-center">
                                                        <i class="fas fa-user mr-1"></i>
                                                        <small>{{ $item->users->name ?? 'Unknown Author' }}</small>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="text-center mt-3">
                                                <a href="{{ route('berita.show', $item->id) }}"
                                                    class="btn btn-primary btn-sm">Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-center mt-4">
                            <a class="btn btn-primary btn-lg shadow-sm" href="{{ url('/video') }}">
                                Semua Berita
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Daftar Staff --}}
            <div class="card mt-5 shadow-sm">
                <h3 class="text-center my-4 text-dark "><span class="border-bottom border-primary">
                        Data Pegawai</span></h3>
                <div class="card-body">
                    @if ($staff->isEmpty())
                        <p class="text-center">Tidak ada data pegawai tersedia.</p>
                    @else
                        <div class="row justify-content-center g-4">
                            @foreach ($staff as $item)
                                <div class="col-md-4 mb-4">
                                    <div class="card shadow d-flex flex-column align-items-center" style="width: 100%;">
                                        <div class="card-body d-flex flex-column align-items-center text-center px-4">
                                            @if ($item->image)
                                                <img src="{{ asset('storage/' . $item->image) }}"
                                                    alt="{{ $item->judul }}" class="img-fluid w-100"
                                                    style="height: 200px; object-fit: cover;">
                                            @else
                                                <div class="text-center py-5 bg-light" style="height: 200px;">No Image
                                                </div>
                                            @endif
                                            <h4 class="mb-1">{{ $item->nama }}</h4>
                                            <p class="text-muted">{{ $item->posisi }}</p>
                                            <div class="mt-2">
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#modalStaff{{ $item->id }}">
                                                    Lihat Detail
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal for each staff -->
                                <div class="modal fade" id="modalStaff{{ $item->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="modalStaffLabel{{ $item->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalStaffLabel{{ $item->id }}">
                                                    {{ $item->nama }}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        @if ($item->image)
                                                            <img src="{{ asset('storage/' . $item->image) }}"
                                                                alt="{{ $item->judul }}" class="img-fluid w-100"
                                                                style="height: 200px; object-fit: cover;">
                                                        @else
                                                            <div class="text-center py-5 bg-light" style="height: 200px;">
                                                                No Image
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Nama:</h6>
                                                        <p>{{ $item->nama ?? 'Tidak ada nama tersedia' }}</p>
                                                        <h6>Posisi:</h6>
                                                        <p>{{ $item->posisi ?? 'Tidak ada posisi tersedia' }}</p>
                                                        <h6>Email:</h6>
                                                        <p>{{ $item->email ?? 'Tidak ada email tersedia' }}</p>
                                                        <h6>No Telepon:</h6>
                                                        <p>{{ $item->no_telp ?? 'Tidak ada no telepon tersedia' }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="text-center mt-2 mb-5">
                            <a class="btn btn-primary btn-lg shadow-sm" href="{{ url('/staff') }}">Semua Pegawai</a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card mt-5 shadow-sm">
                <h3 class="text-center my-4 text-dark">
                    <span class="border-bottom border-primary">Data Alumni</span>
                </h3>
                <div class="card-body">
                    @if ($alumni->isEmpty())
                        <p class="text-center">Tidak ada data alumni tersedia.</p>
                    @else
                        <div class="row justify-content-center g-4">
                            @foreach ($alumni as $item)
                                <div class="col-md-4 mb-4">
                                    <div class="card shadow" style="width: 100%;">
                                        <div class="card-body text-center">
                                            @if ($item->image)
                                                <img src="{{ asset('storage/' . $item->image) }}"
                                                    alt="{{ $item->judul }}" class="img-fluid w-100"
                                                    style="height: 200px; object-fit: cover;">
                                            @else
                                                <div class="text-center py-5 bg-light" style="height: 200px;">No Image
                                                </div>
                                            @endif
                                            <h4 class="mb-1">{{ $item->nama }}</h4>
                                            <p class="text-muted">
                                                <i class="fas fa-graduation-cap"></i>{{ $item->lulusan }}
                                            </p>
                                            <p class="text-muted">
                                                <i class="fas fa-comment"></i>{!! Str::limit($item->pesan, 20) !!}
                                            </p>
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#modalAlumni{{ $item->id }}">
                                                Lihat Detail
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal for each alumni -->
                                <div class="modal fade" id="modalAlumni{{ $item->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="modalAlumniLabel{{ $item->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalAlumniLabel{{ $item->id }}">
                                                    {{ $item->nama }}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        @if ($item->image)
                                                            <img src="{{ asset('storage/' . $item->image) }}"
                                                                alt="Profile picture of {{ $item->nama }}"
                                                                class="img-fluid"
                                                                style="object-fit: cover; height: 200px; width: 100%;">
                                                        @else
                                                            <img src="{{ asset('path/to/placeholder-image.png') }}"
                                                                alt="No Image" class="img-fluid"
                                                                style="object-fit: cover; height: 200px; width: 100%;">
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Nama:</h6>
                                                        <p>{{ $item->nama ?? 'Tidak ada nama tersedia' }}</p>
                                                        <h6>
                                                            <i class="fas fa-graduation-cap"></i> Tahun Lulusan:
                                                        </h6>
                                                        <p>{{ $item->lulusan ?? 'Tidak ada tahun lulusan tersedia' }}</p>
                                                        <h6>
                                                            <i class="fas fa-comment"></i> Pesan:
                                                        </h6>
                                                        <p>{{ $item->pesan ?? 'Tidak ada pesan tersedia' }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="text-center mt-2 mb-5">
                            <a class="btn btn-primary btn-lg shadow-sm" href="{{ url('/alumni') }}">Semua Alumni</a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card mt-5 shadow-sm">
                <h3 class="text-center my-4 text-dark">
                    <span class="border-bottom border-primary">Video</span>
                </h3>
                <div class="card-body">
                    <div class="row justify-content-center g-4">
                        @foreach ($videos as $video)
                            <div class="col-12 col-md-6 mb-4">
                                <!-- Use col-12 for small screens and col-md-6 for medium and up -->
                                <div class="video-item">
                                    <h4 class="text-center">{{ $video->judul }}</h4>
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item"
                                            src="https://www.youtube.com/embed/{{ $video->url }}" allowfullscreen>
                                        </iframe>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="text-center mt-2 mb-5">
                    <a class="btn btn-primary btn-lg shadow-sm" href="{{ url('/video') }}">Semua Video</a>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="container"> --}}
    <!-- Modal -->
    <div class="modal fade" id="welcomeModal" tabindex="-1" role="dialog" aria-labelledby="welcomeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="welcomeModalLabel">{{ $announcement->judul }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="max-height: 60vh; overflow-y: auto;">
                    <img src="{{ asset('storage/' . $announcement->image) }}" class="img-fluid" alt="Deskripsi Gambar">
                </div>
                <div class="modal-footer">
                    <a href="https://instagram.com/yourusername" target="_blank" class="btn btn-info">
                        <i class="fab fa-instagram"></i> Ikuti Kami di Instagram
                    </a>
                    <button type="button" class="btn btn-secondary" id="dismissModalButton">Jangan Tampilkan
                        Lagi</button>
                </div>
            </div>
        </div>
    </div>
    {{-- </div> --}}
@endsection

@push('scripts')
    
@endpush
