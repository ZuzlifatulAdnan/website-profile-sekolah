@extends('layouts.app')

@section('title', 'Agenda')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="container">
        <div class="main-content">
            <div class="section">
                <div class="section-header d-flex justify-content-between align-items-center mb-2">
                    <h5>Agenda</h5>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ route('beranda') }}">Beranda</a></div>
                        <div class="breadcrumb-item">Agenda</div>
                    </div>
                </div>
            </div>
            <div class="card">
                <h3 class="text-center my-4 text-dark">
                    <span class="border-bottom border-primary">Agenda</span>
                </h3>
                <div class="card-body">
                    <form action="{{ route('agenda') }}" method="GET" class="mb-4">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Masukan Judul Agenda" name="judul">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" aria-label="Search">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-body">
                    <div class="row justify-content-center g-4">
                        @foreach ($agenda as $item)
                            <!-- Button triggering the modal -->
                            <div class="col-12 mb-3">
                                <button type="button" class="btn btn-light btn-block" data-toggle="modal"
                                    data-target="#agendaModal{{ $item->id }}">
                                    <div class="d-flex align-items-center">
                                        <div class="mr-3">
                                            <i class="fas fa-bullhorn display-10"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="text-left">
                                                <div class="font-weight-bold h5 mb-1">{{ $item->judul }}
                                                </div> <!-- Title -->
                                                <div class="text-muted small">
                                                    <i class="fas fa-calendar-alt"></i>
                                                    {{ $item->created_at->format('d F Y') }}
                                                    <!-- Date below the title -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="agendaModal{{ $item->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="agendaModalLabel{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="agendaModalLabel{{ $item->id }}">
                                                {{ $item->judul }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body zoom-in-effect" style="max-height: 400px; overflow-y: auto;">
                                            <div class="text-muted small mb-2">
                                                <i class="fas fa-calendar-alt"></i>
                                                {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d F Y') }}
                                                -
                                                {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d F Y') }}
                                                <br>
                                                <i class="fas fa-clock"></i>
                                                {{ \Carbon\Carbon::parse($item->jam_pelaksanaan)->format('H:i') }}
                                            </div>
                                            @if ($item->image)
                                                <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid mb-2"
                                                    alt="{{ $item->judul }}"
                                                    onerror="this.onerror=null; this.src='path/to/default-image.jpg';">
                                            @endif
                                            <p>{!! html_entity_decode($item->deskripsi) !!}</p>
                                            <strong>Organizer:</strong>
                                            <div class="text-muted">{{ $item->penyelenggara }}</div>
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
                    <div class="d-flex justify-content-center">
                        <nav>
                            {{ $agenda->links('pagination::bootstrap-4') }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
