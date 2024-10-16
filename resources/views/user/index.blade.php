@extends('layouts.app')

@section('title', 'General Dashboard')

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

    <div class="main-content">
        <div class="section">
            <div class="card">
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
                            <div class="row gy-4 pb-3">
                                <!-- Kolom Teks Sambutan -->
                                <div class="col-lg-9 order-2 order-lg-1 aos-init aos-animate" data-aos="fade-up"
                                    data-aos-delay="100">
                                    <h3>Sambutan Kepala Sekolah</h3>
                                    <!-- Tampilkan konten sambutan dari database menggunakan Summernote -->
                                    <p>{!! $sambutan->deskripsi !!}</p>
                                </div>
                                <!-- Kolom Gambar Kepala Sekolah -->
                                <div class="col-lg-3 order-1 order-lg-2 text-center aos-init aos-animate"
                                    data-aos="fade-up" data-aos-delay="200">
                                    <img src="https://smkn4-bdl.sch.id/public/img/section/1705899671_fdc4b6337eff3d31abad.png"
                                        alt="Kepala Sekolah" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pengumuman" role="tabpanel" aria-labelledby="pengumuman-tab">
                            <div class="row gy-4 pb-4">
                                <div class="col-md-9">
                                    <h3>Pengumuman</h3>
                                    <div id="accordion">
                                        @foreach ($pengumumans as $index => $pengumuman)
                                            <div class="accordion">
                                                <div class="accordion-header" role="button" data-toggle="collapse"
                                                    data-target="#panel-body-{{ $index }}">
                                                    <div class="d-flex align-items-center" style="margin-right: 8px;">
                                                        <i class="fas fa-bullhorn"></i>
                                                        <h4 class="mb-0" style="margin-left: 5px;">
                                                            {{ $pengumuman->judul }}</h4>
                                                    </div>
                                                    <div class="d-flex align-items-center" style="margin-right: 8px;">
                                                        <i class="fas fa-calendar-alt" style="margin-right: 5px;"></i>
                                                        {{ \Carbon\Carbon::parse($pengumuman->created_at)->format('d F Y') }}
                                                    </div>
                                                </div>
                                                <div class="accordion-body collapse {{ $index === 0 ? 'show' : '' }}"
                                                    id="panel-body-{{ $index }}" data-parent="#accordion">
                                                    <div class="summernote-content">
                                                        {!! $pengumuman->deskripsi !!}
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
                                <a class="btn btn-primary" href=""
                                    style="background-color: blue; border-color: blue;">
                                    Lihat Semua
                                </a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="agenda" role="tabpanel" aria-labelledby="agenda-tab">
                            <div class="row gy-4 pb-4">
                                <div class="col-md-9">
                                    <h3>Agenda</h3>
                                    <div id="accordion">
                                        @foreach ($agenda as $index => $a)
                                            <div class="accordion">
                                                <div class="accordion-header" role="button" data-toggle="collapse"
                                                    data-target="#panel-body-{{ $index }}">
                                                    <div class="d-flex align-items-center" style="margin-right: 8px;">
                                                        <i class="fas fa-bullhorn"></i>
                                                        <h4 class="mb-0" style="margin-left: 5px;">
                                                            {{ $a->judul }}</h4>
                                                    </div>
                                                    <div class="d-flex align-items-center" style="margin-right: 8px;">
                                                        <i class="fas fa-calendar-alt" style="margin-right: 5px;"></i>
                                                        {{ \Carbon\Carbon::parse($a->created_at)->format('d F Y') }}
                                                    </div>
                                                </div>
                                                <div class="accordion-body collapse {{ $index === 0 ? 'show' : '' }}"
                                                    id="panel-body-{{ $index }}" data-parent="#accordion">
                                                    <p style="margin-bottom: 10px;">
                                                        <strong>Dari: </strong>
                                                        {{ \Carbon\Carbon::parse($a->tanggal_mulai)->format('d F Y') }} - <strong>Sampai: </strong>
                                                        {{ \Carbon\Carbon::parse($a->tanggal_selesai)->format('d F Y') }}
                                                    </p>
                                                    <p style="margin-bottom: 10px;"><strong>Jam Pelaksanaan:
                                                        </strong>{!! $a->jam_pelaksanaan !!}</p>
                                                    <p style="margin-bottom: 10px;"><strong>Penyelenggara:
                                                        </strong>{!! $a->penyelenggara !!}</p>
                                                    <img src="{{ asset('storage/' . $a->image) }}"
                                                        alt="Image for {{ $a->judul }}" class="img-fluid mt-3">
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
                                <a class="btn btn-primary" href=""
                                    style="background-color: blue; border-color: blue;">
                                    Lihat Semua
                                </a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="infografis" role="tabpanel" aria-labelledby="infografis-tab">
                            <h3>Infografis</h3>
                            <p>Infografis terbaru sekolah.</p>
                        </div>
                        <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="video-tab">
                            <h3>Video</h3>
                            <p>Video terbaru dari kegiatan sekolah.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
