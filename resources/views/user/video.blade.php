@extends('layouts.app')

@section('title', 'Video')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
<div class="container">
    <div class="main-content">
        <div class="section">
            <div class="section-header d-flex justify-content-between align-items-center mb-2">
                <h5>Video</h5>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('beranda') }}">Beranda</a></div>
                    <div class="breadcrumb-item">Video</div>
                </div>
            </div>
        </div>
        <div class="card mb-4 shadow-sm">
            <h3 class="text-center my-4 text-dark">
                <span class="border-bottom border-primary">Video</span>
            </h3>
            <div class="card-body">
                <div class="row justify-content-center g-4">
                    <div class="col-md-8 video-zoom-in">
                        <div class="tab-content">
                            @foreach ($videos as $video)
                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" 
                                    id="video{{ $video->id }}" role="tabpanel" 
                                    aria-labelledby="video-tab{{ $video->id }}">
                                    <div class="embed-responsive embed-responsive-16by9 mb-4">
                                        <iframe class="embed-responsive-item" 
                                            src="https://www.youtube.com/embed/{{ $video->url }}" 
                                            allowfullscreen></iframe>
                                    </div>
                                    <p>{{ $video->judul }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-4">
                        <form action="{{ route('video') }}" method="GET" class="mb-4">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Masukan Nama Video" name="judul">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit" aria-label="Search">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <ul class="nav nav-pills flex-column text-left" id="myTab4" role="tablist">
                            @foreach ($videos as $video)
                                <li class="nav-item mb-2">
                                    <a class="nav-link {{ $loop->first ? 'active' : '' }}" 
                                       id="video-tab{{ $video->id }}" data-toggle="tab" 
                                       href="#video{{ $video->id }}" role="tab" 
                                       aria-controls="video{{ $video->id }}" 
                                       aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                       <i class="fas fa-play-circle mr-2"></i>{{ $video->judul }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="d-flex justify-content-center">
                            <nav>
                                {{ $videos->links('pagination::bootstrap-4') }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
@endpush
