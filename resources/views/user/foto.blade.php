@extends('layouts.app')

@section('title', 'Foto')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="container">
        <div class="main-content">
            <div class="section">
                <div class="section-header d-flex justify-content-between align-items-center mb-2">
                    <h5>Foto</h5>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ route('beranda') }}">Beranda</a></div>
                        <div class="breadcrumb-item">Foto</div>
                    </div>
                </div>
            </div>
            <div class="card">
                <h3 class="text-center my-4 text-dark">
                    <span class="border-bottom border-primary">Foto</span>
                </h3>
                <div class="card-body">
                    <form action="{{ route('foto') }}" method="GET" class="mb-4">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Masukan Nama Foto" name="judul">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" aria-label="Search">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-body">
                    @if ($foto->isEmpty())
                        <p class="text-center">Tidak ada data foto tersedia.</p>
                    @else
                        <div class="row justify-content-center g-4">
                            @foreach ($foto as $item)
                                <div class="col-xl-4 col-md-6">
                                    <button type="button" class="btn" data-toggle="modal"
                                        data-target="#fotoModal{{ $item->id }}">
                                        <div class="card aos-init aos-animate" data-aos="zoom-in" data-aos-delay="200">
                                            <div class="card-body text-center">
                                                @if ($item->image)
                                                    <img src="{{ asset('storage/' . $item->file) }}"
                                                        alt="{{ $item->nama }}" class="img-fluid w-100"
                                                        style="height: 450px; object-fit: cover;">
                                                @else
                                                    <div class="text-center py-5 bg-light" style="height: 300px;">No
                                                        Image
                                                    </div>
                                                @endif
                                                <div class="mt-3">
                                                    <h5 class="card-title">{{ $item->nama }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="fotoModal{{ $item->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="fotoModalLabel{{ $item->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="fotoModalLabel{{ $item->id }}">
                                                    {{ $item->nama }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="max-height: 60vh; overflow-y: auto;">
                                                @if ($item->image)
                                                    <img src="{{ asset('storage/' . $item->file) }}"
                                                        alt="{{ $item->judul }}" class="img-fluid w-100"
                                                        style="height: auto; object-fit: cover;">
                                                @else
                                                    <div class="text-center py-5 bg-light" style="height: 300px;">No
                                                        Image
                                                    </div>
                                                @endif
                                                <!-- Add any additional content here if needed -->
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
                            {{ $foto->links('pagination::bootstrap-4') }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
