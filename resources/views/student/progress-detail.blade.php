@extends('learner.index')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Progress Tracker</li>
                        <li class="breadcrumb-item active">My Progress</li>
                        <li class="breadcrumb-item active">{{ $subject->title }}</li>
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
                    <h4 class="mb-4">{{ $subject->title }} - Progress Details</h4>

                    <!-- Subject Info -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $subject->title }}</h5>
                            <p class="card-text">{{ $subject->description }}</p>
                            <p><strong>Teacher:</strong> {{ $subject->teacher->name }}</p>
                            <p><strong>Total Lessons:</strong> {{ $totalLessons }}</p>
                        </div>
                    </div>

                    <!-- Progress Summary -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title">Progress</h5>
                                    <h3>{{ number_format($progressPercentage, 2) }}%</h3>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" 
                                            style="width: {{ $progressPercentage }}%;" 
                                            aria-valuenow="{{ $progressPercentage }}" 
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title">Lessons Completed</h5>
                                    <h3>{{ $completedLessons }} / {{ $totalLessons }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Lessons List -->
                    <div class="card mt-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Lessons Progress</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Lesson Title</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($subject->lessons as $index => $lesson)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $lesson->title }}</td>
                                            <td>
                                                @if(in_array($lesson->id, $trackedLessons))
                                                    <span class="badge bg-success">Completed</span>
                                                @else
                                                    <span class="badge bg-warning">Pending</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if(in_array($lesson->id, $trackedLessons))
                                                    <a href="{{ route('learner.subject.learn', ['subject' => $subject->id, 'lesson' => $lesson->id]) }}" class="btn btn-primary btn-sm">Review</a>
                                                @else
                                                    <a href="{{ route('learner.subject.learn', ['subject' => $subject->id, 'lesson' => $lesson->id]) }}" class="btn btn-primary btn-sm">Start Lesson</a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 