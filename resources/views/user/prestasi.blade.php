@extends('layouts.app')

@section('title', 'Prestasi')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="container">
        <div class="main-content">
            <div class="section">
                <div class="section-header d-flex justify-content-between align-items-center mb-2">
                    <h5>Prestasi</h5>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ route('beranda') }}">Beranda</a></div>
                        <div class="breadcrumb-item">Prestasi</div>
                    </div>
                </div>
            </div>
            <div class="card">
                <h3 class="text-center my-4 text-dark">
                    <span class="border-bottom border-primary">Prestasi</span>
                </h3>
                <div class="card-body">
                    <form action="{{ route('prestasi') }}" method="GET" class="mb-4">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Masukan Judul Prestasi" name="judul">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" aria-label="Search">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-body">
                    @if ($prestasi->isEmpty())
                        <p class="text-center">Tidak ada data Prestasi tersedia.</p>
                    @else
                        <div class="row justify-content-center g-4">
                            @foreach ($prestasi as $item)
                                <div class="col-md-4 mb-4 zoom-in-effect">
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
                                <div class="modal fade" id="modalPrestasi{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="modalPrestasiLabel{{ $item->id }}" aria-hidden="true">
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
                    @endif
                    <div class="d-flex justify-content-center">
                        <nav>
                            {{ $prestasi->links('pagination::bootstrap-4') }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
