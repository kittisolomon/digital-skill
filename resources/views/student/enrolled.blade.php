@extends('learner.index')
@section('content')
<div class="card shadow-sm border-0 p-5">
    <div class="card-body row align-items-center text-center text-md-start">
        <!-- Left Image -->
        <div class="col-md-3 ">
            <img src="{{ asset('backend/images/bulb-dark.png') }}" alt="Education" class="img-fluid" style="max-width: 120px;">
        </div>

        <!-- Middle Content -->
        <div class="col-md-6" >
            <h3 class="fw-bold mb-4" style="font-size: 2.0rem; color:#012970;">
                Welcome to Your Learning Journey
                <span class="text-primary">{{ Auth::user()->name }}</span>
            </h3>
            <p class="text-muted fs-5 mb-4">
                You're enrolled at <span class="fw-bold text-dark">{{ $schoolName }}</span>. 
                Let's make your learning experience exceptional!
            </p>
            <div class="d-flex align-items-center gap-3">
                <div class="d-flex align-items-center">
                    <i class="bx bx-book-open fs-4 text-primary me-2"></i>
                    <span class="fw-medium">{{ $totalSubjects }} Active Subjects</span>
                </div>
                <div class="d-flex align-items-center">
                    <i class="bx bx-time fs-4 text-success me-2"></i>
                    <span class="fw-medium">Learn at Your Pace</span>
                </div>
            </div>
        </div>

        <!-- Right Image -->
        <div class="col-md-3 d-flex justify-content-md-end justify-content-center mt-4 mt-md-0">
            <img src="{{ asset('backend/images/pencil-rocket.png') }}" alt="Career" class="img-fluid" style="max-width: 140px;">
        </div>
    </div>
</div>

<section class="my-courses-section">
    <div class="card mb-6">
        <div class="card-header d-flex flex-wrap justify-content-between gap-4">
            <div class="card-title mb-0 me-1">
                <h4 class="mb-0 fw-bold">My Subjects</h4>
                @if($totalSubjects > 1)
                    <p class="mb-0">Total {{ $totalSubjects }} subjects you have enrolled for</p>
                @elseif($totalSubjects === 1)
                    <p class="mb-0">Total {{ $totalSubjects }} subject you have enrolled for</p>
                @else
                    <p class="mb-0">You have not enrolled for any subject</p>
                @endif
            </div>
            <div class="d-flex justify-content-md-end align-items-sm-center align-items-start column-gap-6 flex-sm-row flex-column row-gap-4">
                <select class="form-select">
                    <option value="">All Subjects</option>
                    <!-- Optionally populate with subject categories if available -->
                </select>
                <div class="form-check form-switch my-2 ms-2">
                    <input type="checkbox" class="form-check-input form-control" id="SubjectSwitch" />
                    <label class="form-check-label text-nowrap mb-0" for="SubjectSwitch">Hide completed</label>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <div class="row gy-6 mb-6">
                        @foreach($enrolledSubjects as $enrolled)
                        <div class="col-sm-6 col-lg-4">
                            <div class="card p-2 h-90 shadow transition-hover">
                                <div class="rounded-2 text-center mb-4 mt-4">
                                    @if($enrolled->subject->photo_link)
                                        <a href="#"><img class="img-fluid" src="{{ $enrolled->subject->photo_link }}" alt="Subject Image" style="max-height: 150px; object-fit: cover;" /></a>
                                    @else
                                        <div class="d-flex justify-content-center align-items-center" style="height: 150px; background: #f8f9fa; border-radius: 8px;">
                                            <i class="bi bi-book fs-1 text-muted"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body p-4 pt-2">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <span class="badge bg-danger">{{ $enrolled->subject->teacher->name ?? 'Unknown Teacher' }}</span>
                                        <small class="text-muted"><i class="bx bx-video me-1"></i>{{ $enrolled->subject->lessons->count() }} Lessons</small>
                                    </div>
                                    <a href="#" class="h5 p-primary d-block">{{ $enrolled->subject->title ?? 'Untitled Subject' }}</a>
                                    <p class="text-muted mt-2">{{ Str::limit($enrolled->subject->description, 30) }}</p>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <small class="text-muted">{{ $enrolled->progressPercentage }}%</small>
                                    </div>
                                    <div class="progress mb-4" style="height: 8px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ $enrolled->progressPercentage }}%" aria-valuenow="{{ $enrolled->progressPercentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex justify-content-between gap-2 mt-4">
                                        <a href="{{ route('learner.subject.learn', $enrolled->subject->id) }}" class="btn btn-sm btn-success w-100">
                                            <i class="bx bx-play-circle me-1"></i> Proceed
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 