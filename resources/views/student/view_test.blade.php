{{-- @extends('learner.index')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('learner.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Test Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="card-title">Test Details</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" value="{{ $test->title }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" id="description" value="{{ $test->description }}"
                                    readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
@extends('learner.index')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('learner.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Test Details</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container py-2">
    <!-- Breadcrumb Navigation -->
    <!-- <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('learner.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Test Details</li>
        </ol>
    </nav> -->

    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-sm border-0 rounded-4 mb-4">
                <div class="card-body p-4">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-3">
                        <div class="mb-3 mb-md-0">
                            <h2 class="fw-bold mb-1" style="color: #012970;">
                                <i class="bi bi-clipboard-check me-2"></i>{{ $test->title }}
                            </h2>
                            <span class="badge bg-info text-dark">{{ $test->subject->title ?? 'Test' }}</span>
                        </div>
                        <div class="text-md-end">
                            <div class="mb-2">
                                <i class="bi bi-person-circle me-1"></i>
                                <span class="fw-medium">Examiner:</span>
                                <span>{{ $test->teacher->name ?? 'Test Administrator' }}</span>
                            </div>
                            <div>
                                <i class="bi bi-clock me-1"></i>
                                <span class="fw-medium">Duration:</span>
                                <span>{{ $test->duration ?? 'Not specified' }} mins</span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="alert alert-info mb-4">
                        <h5 class="alert-heading mb-2"><i class="bi bi-info-circle me-2"></i>Test Instructions</h5>
                        <div class="mb-0">{!! $test->instructions !!}</div>
                    </div>
                    <div class="row g-4 mb-4">
                        <div class="col-md-6">
                            <div class="bg-light rounded-3 p-3 h-100">
                                <div class="mb-2 text-muted">Total Questions</div>
                                <div class="fs-4 fw-bold">{{ $test->questions->count() ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bg-light rounded-3 p-3 h-100">
                                <div class="mb-2 text-muted">Passing Score</div>
                                <div class="fs-4 fw-bold">{{ $test->passing_score ?? '50' }}%</div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <a href="{{ route('tests.start', $test->id) }}" class="btn btn-lg btn-success px-5 shadow">
                            <i class="bi bi-play-circle me-2"></i> Start Test
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection