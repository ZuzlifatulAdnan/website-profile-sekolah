@extends('layouts.app')

@section('title', 'Alur')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="container">
        <div class="main-content">
            <div class="section">
                <div class="section-header d-flex justify-content-between align-items-center mb-2">
                    <h5>Alur</h5>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ route('beranda') }}">Beranda</a></div>
                        <div class="breadcrumb-item">Alur</div>
                    </div>
                </div>
            </div>
            <div class="card">
                <h3 class="text-center my-4 text-dark">
                    <span class="border-bottom border-primary">Alur</span>
                </h3>
                <div class="card-body">
                    <form action="{{ route('berita') }}" method="GET" class="mb-4">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="judul"
                                value="{{ request('judul') }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" aria-label="Search">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-body">
                    @if ($alur->isEmpty())
                        <p class="text-center">Tidak ada Alur tersedia.</p>
                    @else
                        <div class="row justify-content-center g-4">
                            @foreach ($alur as $item)
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                    <div class="card shadow-sm d-flex flex-column align-items-center"
                                        style="min-height: 400px;">
                                        @if ($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->judul }}"
                                                class="img-fluid w-100" style="height: 200px; object-fit: cover;">
                                        @else
                                            <div class="text-center py-5 bg-light" style="height: 200px;">No Image</div>
                                        @endif
                                        <div class="card-body d-flex flex-column justify-content-between"
                                            style="height: calc(100% - 200px);">
                                            <div>
                                                <h4 class="mb-1">{{ Str::limit($item->judul, 15) }}</h4>
                                                <p class="mb-2">{{ Str::limit(strip_tags($item->deskripsi), 100) }}</p>
                                            </div>
                                            <div>
                                                <div class="d-flex justify-content-between align-items-center mb-1">
                                                    <span class="d-flex align-items-center">
                                                        <i class="fas fa-calendar-alt mr-1"></i>
                                                        <small
                                                            class="font-weight-bold">{{ $item->created_at ? $item->created_at->format('d M Y') : 'Date Not Available' }}</small>
                                                    </span>
                                                    <span class="mx-2">||</span>
                                                    <span class="d-flex align-items-center">
                                                        <i class="fas fa-user mr-1"></i>
                                                        <small>{{ $item->users->name ?? 'Unknown Author' }}</small>
                                                    </span>
                                                </div>
                                                <div class="text-center mt-3">
                                                    <a href="{{ route('alur.show', $item->id) }}"
                                                        class="btn btn-primary btn-sm">Selengkapnya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <div class="d-flex justify-content-center">
                        <nav>
                            {{ $alur->links('pagination::bootstrap-4') }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
