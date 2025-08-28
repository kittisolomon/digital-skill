@extends('learner.index')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Tracking</li>
                        <li class="breadcrumb-item active">Progress Tracking</li>
                    </ol>
                </nav>
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-outline-primary">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>
    </div>
</div>

<section class="my-courses-section">
    <div class="card mb-6">
        <div class="card-header d-flex flex-wrap justify-content-between gap-4">
            <div class="card-title mb-0 me-1">
                <h4 class="mb-0 fw-bold">My Subject Progress</h4>
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
                                        <a href="#"><img class="img-fluid" src="{{ $enrolled->subject->photo_link }}" style="max-width: 500px; max-height:200px;" alt="{{ $enrolled->subject->title }}" /></a>
                                    @else
                                        <div class="d-flex justify-content-center align-items-center" style="height: 200px; background: #f8f9fa; border-radius: 8px;">
                                            <i class="bi bi-book fs-1 text-muted"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body p-4 pt-2">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <span class="badge bg-danger">{{ $enrolled->subject->teacher->name }}</span>
                                        <small class="text-muted"><i class="bx bx-video me-1"></i>{{ $enrolled->subject->lessons->count() }} Lessons</small>
                                    </div>
                                    <a href="" class="h5 p-primary d-block">{{ $enrolled->subject->title }}</a>
                                    <small class="d-block">{{ $progressData[$enrolled->subject->id] ?? 0 }}% completed</small>
                                    <div class="progress mb-4" style="height: 8px;">
                                        <div 
                                            class="progress-bar bg-success" 
                                            role="progressbar" 
                                            style="width: {{ $progressData[$enrolled->subject->id] ?? 0 }}%">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between gap-2">
                                        <a class="btn btn-sm bg-success text-white d-flex align-items-center" 
                                           href="{{ route('learner.progress-detail', ['subject' => $enrolled->subject]) }}"
                                           style="transition: background-color 0.3s ease;"
                                           onmouseover="this.style.backgroundColor='#28a745'"
                                           onmouseout="this.style.backgroundColor='#198754'"> 
                                            <i class="bx bx-rotate-right me-2"></i><span>View Subject Progress</span> 
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