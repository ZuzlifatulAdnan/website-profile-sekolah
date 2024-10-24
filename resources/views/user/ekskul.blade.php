@extends('layouts.app')

@section('title', 'Ekskul')

@push('style')
    <!-- You can add custom styles here if needed -->
@endpush

@section('main')
    <div class="main-content">
        <div class="container">
            <div class="section">
                <div class="section-body">
                    <div class="section-header d-flex justify-content-between align-items-center mb-2">
                        <h5>Ekstrkulikuler </h5>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item">
                                <a href="{{ url('/beranda') }}">Beranda</a>
                            </div>
                            <div class="breadcrumb-item">
                                <a href="#">Ekstrkulikuler</a>
                            </div>
                            <div class="breadcrumb-item active">{{ $ekskul->judul }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Title of the Ekskul -->
                                    <h5 class="card-title"><span class="border-bottom border-primary">
                                            {{ $ekskul->judul }}</span></h5>

                                    <!-- Display Image (if available) -->
                                    @if ($ekskul->image)
                                        <img src="{{ asset('storage/' . $ekskul->image) }}" alt="{{ $ekskul->judul }}"
                                            class="img-fluid w-100 mb-4" style="max-height: 400px; object-fit: cover;">
                                    @else
                                        <!-- Placeholder Image if no image available -->
                                        <div class="text-center py-5 bg-light" style="height: 400px;">No Image</div>
                                    @endif

                                    <!-- Description of the Ekskul -->
                                    <p>{!! html_entity_decode($ekskul->deskripsi) !!}</p>
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
                                                    <span
                                                        style="color: {{ $kategori->berita_count == 0 ? 'red' : 'black' }};">
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
                                                                <img src="{{ asset('images/no-image.png') }}"
                                                                    alt="No Image" class="img-fluid mr-2"
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
    </div>
@endsection

@push('scripts')
    <!-- You can add custom scripts here if needed -->
@endpush
