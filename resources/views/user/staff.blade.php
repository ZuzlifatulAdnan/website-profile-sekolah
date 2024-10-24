@extends('layouts.app')

@section('title', 'Data Staff')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="container">
        <div class="main-content">
            <div class="section">
                <div class="section-header d-flex justify-content-between align-items-center mb-2">
                    <h5>Data Pegawai</h5>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ route('beranda') }}">Beranda</a></div>
                        <div class="breadcrumb-item">Data Pegawai</div>
                    </div>
                </div>
            </div>
            <div class="card">
                <h3 class="text-center my-4 text-dark">
                    <span class="border-bottom border-primary">Data Pegawai</span>
                </h3>
                <div class="card-body">
                    <form action="{{ route('staff') }}" method="GET" class="mb-4">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="nama"
                                value="{{ request('nama') }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-body">
                    @if ($staff->isEmpty())
                        <p class="text-center">Tidak ada data pegawai tersedia.</p>
                    @else
                        <div class="row justify-content-center g-4">
                            @foreach ($staff as $item)
                                <div class="col-md-4 mb-4 zoom-in-effect">
                                    <div class="card shadow d-flex flex-column align-items-center" style="width: 100%;">
                                        <div class="card-body d-flex flex-column align-items-center text-center px-4">
                                            <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('path/to/placeholder-image.png') }}"
                                                alt="Profile picture of {{ $item->nama }}" class="img-fluid"
                                                style="object-fit: cover; width: 100%; height: 200px;">
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
                                <div class="modal fade" id="modalStaff{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="modalStaffLabel{{ $item->id }}" aria-hidden="true">
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
                                                        <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('path/to/placeholder-image.png') }}"
                                                            alt="Profile picture of {{ $item->nama }}" class="img-fluid"
                                                            style="object-fit: cover; height: 200px; width: 100%;">
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
                    @endif
                    <div class="d-flex justify-content-center">
                        <nav>
                            {{ $staff->links('pagination::bootstrap-4') }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
