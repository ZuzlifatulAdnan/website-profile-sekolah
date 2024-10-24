@extends('layouts.app')

@section('title', 'Kuota Show')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="container">
        <div class="main-content">
            <div class="section">
                <div class="section-header d-flex justify-content-between align-items-center mb-2">
                    <h5>Kuota</h5>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ route('beranda') }}">Beranda</a></div>
                        <div class="breadcrumb-item active"><a href="{{ route('kuota') }}">Kuota</a></div>
                        <div class="breadcrumb-item">{{ $kuota->judul }}</div>
                    </div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-center text-dark mb-4">
                                    <span class="border-bottom border-primary">{{ $kuota->judul }}</span>
                                </h3>

                                <div class="row">
                                    <div class="col-12">
                                        @if ($kuota->image)
                                            <!-- Responsive image with max height to fit different screen sizes -->
                                            <img src="{{ asset('storage/' . $kuota->image) }}" alt="{{ $kuota->judul }}"
                                                class="img-fluid w-100 mb-4" style="max-height: 400px; object-fit: cover;">
                                        @else
                                            <div class="text-center py-5 bg-light" style="height: 400px;">No Image</div>
                                        @endif
                                    </div>
                                </div>

                                <!-- News details: Date, Author, and Category -->
                                <div class="row mb-4">
                                    <div class="col-12 d-flex justify-content-between flex-wrap">
                                        <span class="text-muted">
                                            <i class="fas fa-calendar-alt"></i>
                                            {{ $kuota->created_at ? $kuota->created_at->format('d M Y') : 'Date Not Available' }}
                                        </span>
                                        <span class="text-muted">
                                            <i class="fas fa-user"></i>
                                            {{ $kuota->users->name ?? 'Unknown Author' }}
                                        </span>
                                    </div>
                                </div>

                                <!-- News description/content -->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <p> {!! html_entity_decode($kuota->deskripsi) !!}</p>
                                    </div>
                                </div>

                                <!-- Back button aligned to the left on mobile, center on larger screens -->
                                <div class="row">
                                    <div class="col-12 text-center text-md-left">
                                        <a href="{{ route('kuota') }}" class="btn btn-primary">Kembali ke Daftar Kuota</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mt-3"><span class="border-bottom border-primary">
                                        SEARCH BERITA</span></h5>
                                <form action="{{ route('berita') }}" method="GET" class="d-flex">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Masukan Judul Berita"
                                            name="judul" value="{{ request('judul') }}"
                                            style="border-radius: 5px 0 0 5px;">
                                        <div class="input-group-append">
                                            <button class="btn"
                                                style="background-color: #6C63FF; color: white; border-radius: 0 5px 5px 0;">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <h5 class="card-title mt-3"><span class="border-bottom border-primary">
                                        KATEGORI BERITA</span></h5>
                                <div class="row">
                                    @foreach ($kategoriBerita as $kategori)
                                        <div class="col-12">
                                            <a href="{{ route('berita', ['kategori_berita_id' => $kategori->id]) }}"
                                                class="list-group-item d-flex justify-content-between align-items-center mb-2"
                                                style="text-decoration: none; display: block;">
                                                <span>
                                                    <i class="fas fa-folder" style="color: #FFCC00;"></i>
                                                    {{ $kategori->nama }}
                                                </span>
                                                <span style="color: {{ $kategori->berita_count == 0 ? 'red' : 'black' }};">
                                                    ({{ $kategori->berita_count }})
                                                </span>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Berita Terbaru Section -->
                                <h5 class="card-title mt-4"><span class="border-bottom border-primary">
                                        Berita Terbaru</span></h5>
                                @if ($beritaTerbaru->isEmpty())
                                    <p class="text-muted">Tidak ada berita terbaru.</p>
                                @else
                                    <div class="row">
                                        @foreach ($beritaTerbaru as $berita)
                                            <div class="col-12">
                                                <!-- Adjust col-md-4 to your preferred column width -->
                                                <div class="card">
                                                    <div class="d-flex p-2">
                                                        <!-- Display Image if it exists -->
                                                        @if ($berita->image)
                                                            <img src="{{ asset('storage/' . $berita->image) }}"
                                                                alt="{{ $berita->judul }}" class="img-fluid mr-2"
                                                                style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                                                        @else
                                                            <!-- Placeholder Image if no image is available -->
                                                            <img src="{{ asset('images/no-image.png') }}" alt="No Image"
                                                                class="img-fluid mr-2"
                                                                style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                                                        @endif
                                                        <div class="d-flex flex-column">
                                                            <!-- News Title - Clickable to View the Full News -->
                                                            <a href="{{ route('berita.show', $berita->id) }}"
                                                                class="font-weight-bold"
                                                                style="text-decoration: none; color: inherit;">
                                                                {{ $berita->judul }}
                                                            </a>
                                                            <!-- Additional Info (Optional, e.g., Date or Excerpt) -->
                                                            <small
                                                                class="text-muted">{{ $berita->created_at->format('d M Y') }}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
