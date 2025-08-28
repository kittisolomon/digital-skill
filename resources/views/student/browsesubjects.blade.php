@extends('learner.index')
@section('content')
<div class="card shadow-sm border-0 p-5">
    <div class="card-body row align-items-center text-center text-md-start">
        <!-- Left Image -->
        <div class="col-md-3">
            <img src="{{ asset('backend/images/bulb-dark.png') }}" alt="Education" class="img-fluid" style="max-width: 120px;">
        </div>

        <!-- Middle Content -->
        <div class="col-md-6">
            <h3 class="fw-bold mb-4" style="font-size: 2.0rem; color:#012970;">
                Available Subjects
                <span class="text-primary">to Explore</span>
            </h3>
            <p class="text-muted fs-5 mb-4">
                Browse through our collection of subjects and enroll in the ones that interest you.
            </p>
            <div class="d-flex align-items-center gap-3">
                <div class="d-flex align-items-center">
                    <i class="bx bx-book-open fs-4 text-primary me-2"></i>
                    <span class="fw-medium">{{ $subjects->total() }} Subjects Available</span>
                </div>
            </div>
        </div>

        <!-- Right Image -->
        <div class="col-md-3 d-flex justify-content-md-end justify-content-center mt-4 mt-md-0">
            <img src="{{ asset('backend/images/pencil-rocket.png') }}" alt="Career" class="img-fluid" style="max-width: 140px;">
        </div>
    </div>
</div>

<section class="subjects-section">
    <div class="card mb-6">
        <div class="card-header d-flex flex-wrap justify-content-between gap-4">
            <div class="card-title mb-0 me-1">
                <h4 class="mb-0 fw-bold">Browse Subjects</h4>
                <p class="mb-0">Find and enroll in subjects that match your interests</p>
            </div>
            <div class="d-flex justify-content-md-end align-items-sm-center align-items-start column-gap-6 flex-sm-row flex-column row-gap-4">
                <select class="form-select">
                    <option value="">All Categories</option>
                    <!-- Optionally populate with subject categories if available -->
                </select>
                <div class="form-check form-switch my-2 ms-2">
                    <input type="checkbox" class="form-check-input form-control" id="SubjectSwitch" />
                    <label class="form-check-label text-nowrap mb-0" for="SubjectSwitch">Hide enrolled</label>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <div class="row gy-6 mb-6">
                        @forelse($subjects as $subject)
                        <div class="col-sm-6 col-lg-4">
                            <div class="card p-2 h-90 shadow transition-hover">
                                <div class="rounded-2 text-center mb-4 mt-4">
                                    @if($subject->photo_link )
                                        <a href="#"><img class="img-fluid" src="{{ $subject->photo_link }}" alt="Subject Image" style="max-height: 150px; object-fit: cover;" /></a>
                                    @else
                                        <div class="d-flex justify-content-center align-items-center" style="height: 150px; background: #f8f9fa; border-radius: 8px;">
                                            <i class="bi bi-book fs-1 text-muted"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body p-4 pt-2">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <span class="badge bg-danger">{{ $subject->teacher->name ?? 'No Teacher Assigned' }}</span>
                                        {{-- <p class="d-flex align-items-center fw-medium gap-1 mb-0">
                                            @if(isset($subject->rating))
                                                {{ number_format($subject->rating, 1) }} <span class="text-warning"><i class="bx bxs-star me-1"></i></span>
                                            @else
                                                N/A <span class="text-warning"><i class="bx bxs-star me-1"></i></span>
                                            @endif
                                        </p> --}}
                                        <small class="text-muted"><i class="bx bx-video me-1"></i>{{ $subject->lessons->count() }} Lessons</small>
                                    </div>
                                    <a href="#" class="h5 p-primary">{{ $subject->title }}</a>
                                    <p class="text-muted mt-2">{{ Str::limit($subject->description, 100) }}</p>
                                    <div class="d-flex justify-content-between gap-2 mt-4">
                                        @if(in_array($subject->id, $enrolledSubjectIds))
                                            <button class="btn btn-sm btn-success w-100" disabled>
                                                <i class="bx bx-check me-1"></i> Enrolled
                                            </button>
                                        @else
                                            <form action="{{ route('learner.subject.enroll', $subject->id) }}" method="POST" class="w-100">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success w-100">
                                                    <i class="bx bx-plus me-1"></i> Enroll Now
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <div class="alert alert-info">
                                <i class="bx bx-info-circle me-2"></i> No subjects available at the moment.
                            </div>
                        </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $subjects->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 