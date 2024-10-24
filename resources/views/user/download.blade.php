@extends('layouts.app')

@section('title', 'Download')

@push('style')
    <!-- Include any required CSS libraries here -->
@endpush

@section('main')
    <div class="container">
        <div class="main-content">
            <div class="section">
                <div class="section-header d-flex justify-content-between align-items-center mb-2">
                    <h5>Download</h5>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ route('beranda') }}">Beranda</a></div>
                        <div class="breadcrumb-item">Download</div>
                    </div>
                </div>
            </div>
            <div class="card">
                <h3 class="text-center my-4 text-dark">
                    <span class="border-bottom border-primary">Download</span>
                </h3>
                <div class="card-body">
                    <form action="{{ route('download') }}" method="GET" class="mb-4">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Masukan Judul Download" name="judul"
                                aria-label="Search for Download Title">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" aria-label="Search">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="mt-5">
                        @foreach ($download as $item)
                            <div class="col-12 mb-3 bg-light">
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <div class="d-flex align-items-center flex-grow-1">
                                        <div class="mr-3">
                                            <i class="fas fa-download display-10"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="text-left">
                                                <div class="font-weight-bold h5 mb-1">{{ $item->nama }}</div>
                                                <div class="text-muted small">
                                                    <i class="fas fa-calendar-alt"></i>
                                                    {{ $item->created_at->format('d F Y') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 mt-md-0 flex-shrink-0">
                                        <a href="{{ asset('storage/' . $item->file) }}" class="btn btn-primary btn-sm"
                                            download aria-label="Download {{ $item->nama }}">
                                            <i class="fas fa-download"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <nav>
                        {{ $download->links('pagination::bootstrap-4') }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Include any required JS libraries here -->
@endpush
