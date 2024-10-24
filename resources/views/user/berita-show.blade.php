@extends('layouts.app')

@section('title', 'Berita Show')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="container">
        <div class="main-content">
            <div class="section">
                <div class="section-header d-flex justify-content-between align-items-center mb-2">
                    <h5>Berita</h5>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ route('beranda') }}">Beranda</a></div>
                        <div class="breadcrumb-item active"><a href="{{ route('berita') }}">Berita</a></div>
                        <div class="breadcrumb-item">{{ $berita->judul }}</div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center text-dark mb-4">
                        <span class="border-bottom border-primary">{{ $berita->judul }}</span>
                    </h3>

                    <div class="row">
                        <div class="col-12 zoom-in-effect">
                            @if ($berita->image)
                                <!-- Responsive image with max height to fit different screen sizes -->
                                <img src="{{ asset('storage/' . $berita->image) }}" alt="{{ $berita->judul }}"
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
                                {{ $berita->created_at ? $berita->created_at->format('d M Y') : 'Date Not Available' }}
                            </span>
                            <span class="text-muted">
                                <i class="fas fa-user"></i>
                                {{ $berita->users->name ?? 'Unknown Author' }}
                            </span>
                            <span class="badge badge-primary">{{ $berita->kategoriBerita->nama }}</span>
                        </div>
                    </div>

                    <!-- News description/content -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <p> {!! html_entity_decode($berita->deskripsi) !!}</p>
                        </div>
                    </div>

                    <!-- Back button aligned to the left on mobile, center on larger screens -->
                    <div class="row">
                        <div class="col-12 text-center text-md-left">
                            <a href="{{ route('berita') }}" class="btn btn-primary">Kembali ke Daftar Berita</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
