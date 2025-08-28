@extends('school.index')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('school.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('school.enrollments') }}">Enrollments</a></li>
                        <li class="breadcrumb-item active">Student Progress</li>
                    </ol>
                </nav>
            </div>
            <a href="{{ route('school.dashboard') }}" class="btn btn-outline-primary">
                <i class="bi bi-arrow-left"></i> Back to Dashboard
            </a>
        </div>
    </div>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Student Progress - {{ $learner->name }}</h5>
                    <p class="text-muted">Subject: {{ $subject->title }}</p>
                    
                    <!-- Progress Overview -->
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body text-center">
                                    <h4>{{ $completedLessons }}</h4>
                                    <p class="mb-0">Lessons Completed</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-success text-white">
                                <div class="card-body text-center">
                                    <h4>{{ $totalLessons - $completedLessons }}</h4>
                                    <p class="mb-0">Lessons Remaining</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-info text-white">
                                <div class="card-body text-center">
                                    <h4>{{ round($progressPercentage, 1) }}%</h4>
                                    <p class="mb-0">Overall Progress</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-warning text-white">
                                <div class="card-body text-center">
                                    <h4>{{ $enrollment->created_at->format('M d') }}</h4>
                                    <p class="mb-0">Enrolled Date</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Progress Bar -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="fw-bold">Overall Progress</span>
                                <span class="fw-bold">{{ round($progressPercentage, 1) }}%</span>
                            </div>
                            <div class="progress" style="height: 20px;">
                                <div class="progress-bar bg-success" role="progressbar" 
                                     style="width: {{ $progressPercentage }}%" 
                                     aria-valuenow="{{ $progressPercentage }}" 
                                     aria-valuemin="0" 
                                     aria-valuemax="100">
                                    {{ round($progressPercentage, 1) }}%
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Lesson-by-Lesson Progress -->
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title mb-0">Lesson Progress</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th width="40%">Lesson Title</th>
                                            <th width="15%">Status</th>
                                            <th width="20%">Completed Date</th>
                                            <th width="20%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($lessons as $index => $lesson)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <strong>{{ $lesson->title }}</strong>
                                                @if($lesson->topic)
                                                    <br><small class="text-muted">{{ $lesson->topic }}</small>
                                                @endif
                                            </td>
                                            <td>
                                                @if($lessonProgress[$lesson->id]['is_completed'])
                                                    <span class="badge bg-success">
                                                        <i class="bi bi-check-circle"></i> Completed
                                                    </span>
                                                @else
                                                    <span class="badge bg-warning">
                                                        <i class="bi bi-clock"></i> Pending
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($lessonProgress[$lesson->id]['viewed_at'])
                                                    {{ \Carbon\Carbon::parse($lessonProgress[$lesson->id]['viewed_at'])->format('M d, Y H:i') }}
                                                @else
                                                    <span class="text-muted">Not started</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($lessonProgress[$lesson->id]['is_completed'])
                                                    <span class="text-success">
                                                        <i class="bi bi-check-circle-fill"></i> Viewed
                                                    </span>
                                                @else
                                                    <span class="text-muted">
                                                        <i class="bi bi-eye-slash"></i> Not viewed
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Progress Summary -->
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title mb-0">Progress Summary</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <p><strong>Total Lessons:</strong> {{ $totalLessons }}</p>
                                            <p><strong>Completed:</strong> {{ $completedLessons }}</p>
                                        </div>
                                        <div class="col-6">
                                            <p><strong>Remaining:</strong> {{ $totalLessons - $completedLessons }}</p>
                                            <p><strong>Progress:</strong> {{ round($progressPercentage, 1) }}%</p>
                                        </div>
                                    </div>
                                    
                                    @if($progressPercentage >= 100)
                                        <div class="alert alert-success">
                                            <i class="bi bi-trophy"></i> 
                                            <strong>Congratulations!</strong> This student has completed all lessons in this subject.
                                        </div>
                                    @elseif($progressPercentage >= 75)
                                        <div class="alert alert-info">
                                            <i class="bi bi-star"></i> 
                                            <strong>Great Progress!</strong> This student is making excellent progress.
                                        </div>
                                    @elseif($progressPercentage >= 50)
                                        <div class="alert alert-warning">
                                            <i class="bi bi-lightbulb"></i> 
                                            <strong>Good Progress!</strong> This student is making steady progress.
                                        </div>
                                    @else
                                        <div class="alert alert-secondary">
                                            <i class="bi bi-info-circle"></i> 
                                            <strong>Getting Started!</strong> This student is beginning their learning journey.
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title mb-0">Student Information</h6>
                                </div>
                                <div class="card-body">
                                    <p><strong>Name:</strong> {{ $learner->name }}</p>
                                    <p><strong>Email:</strong> {{ $learner->email }}</p>
                                    <p><strong>Phone:</strong> {{ $learner->phone ?? 'Not provided' }}</p>
                                    <p><strong>Joined:</strong> {{ $learner->created_at->format('M d, Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection 