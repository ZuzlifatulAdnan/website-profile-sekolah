@extends('layouts.app')

@section('title', 'Hubungi Kami')

@push('style')
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endpush

@section('main')
    <div class="main-content">
        <div class="container">
            <div class="section">
                <div class="section-body">
                    <div class="section-header d-flex justify-content-between align-items-center mb-2">
                        <h5>Hubungi Kami</h5>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item">
                                <a href="{{ url('/beranda') }}">Beranda</a>
                            </div>
                            <div class="breadcrumb-item active">Hubungi Kami</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Hubungi Kami</h5>
                                    <br>
                                    <form action="{{ route('pesan.store') }}" method="POST">
                                        @csrf 
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama"
                                                placeholder="Enter your name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Enter your email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="pesan">Pesan</label>
                                            <textarea class="form-control" id="pesan" name="pesan" rows="3" placeholder="Enter your message" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
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
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script>
        // Mengecek apakah ada pesan sukses di session
        @if (session('success'))
            Swal.fire({
                title: 'Sukses!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif
    </script>
    </script>
@endpush
