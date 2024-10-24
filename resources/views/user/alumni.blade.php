@extends('layouts.app')

@section('title', 'Alumni')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="container">
        <div class="main-content">
            <div class="section">
                <div class="section-header d-flex justify-content-between align-items-center mb-2">
                    <h5>Alumni</h5>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ route('beranda') }}">Beranda</a></div>
                        <div class="breadcrumb-item">Alumni</div>
                    </div>
                </div>
            </div>
            <div class="card">
                <h3 class="text-center my-4 text-dark">
                    <span class="border-bottom border-primary">Alumni</span>
                </h3>
                <div class="card-body">
                    <form action="{{ route('alumni') }}" method="GET" class="mb-4">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Masukan Nama Alumni" name="judul">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" aria-label="Search">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-body">
                    @if ($alumni->isEmpty())
                        <p class="text-center">Tidak ada data alumni tersedia.</p>
                    @else
                        <div class="row justify-content-center g-4">
                            @foreach ($alumni as $item)
                                <div class="col-md-4 mb-4 zoom-in-effect">
                                    <div class="card shadow" style="width: 100%;">
                                        <div class="card-body text-center">
                                            @if ($item->image)
                                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->judul }}"
                                                    class="img-fluid w-100" style="height: 200px; object-fit: cover;">
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
                                <div class="modal fade" id="modalAlumni{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="modalAlumniLabel{{ $item->id }}" aria-hidden="true">
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
                    @endif
                    <div class="d-flex justify-content-center">
                        <nav>
                            {{ $alumni->links('pagination::bootstrap-4') }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
