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
                        <li class="breadcrumb-item active">Enrollment Details</li>
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
                    <h5 class="card-title">Enrollment Details</h5>
                    
                    <div class="row">
                        <!-- Learner Information -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title mb-0">Learner Information</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <strong>Name:</strong>
                                        </div>
                                        <div class="col-sm-8">
                                            {{ $learner->name }}
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <strong>Email:</strong>
                                        </div>
                                        <div class="col-sm-8">
                                            {{ $learner->email }}
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <strong>Phone:</strong>
                                        </div>
                                        <div class="col-sm-8">
                                            {{ $learner->phone ?? 'Not provided' }}
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <strong>Joined:</strong>
                                        </div>
                                        <div class="col-sm-8">
                                            {{ $learner->created_at->format('M d, Y') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Subject Information -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title mb-0">Subject Information</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <strong>Subject:</strong>
                                        </div>
                                        <div class="col-sm-8">
                                            {{ $subject->title }}
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <strong>Description:</strong>
                                        </div>
                                        <div class="col-sm-8">
                                            {{ Str::limit($subject->description, 100) }}
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <strong>Total Lessons:</strong>
                                        </div>
                                        <div class="col-sm-8">
                                            {{ $totalLessons }}
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <strong>Status:</strong>
                                        </div>
                                        <div class="col-sm-8">
                                            <span class="badge bg-{{ $subject->status === 'published' ? 'success' : 'warning' }}">
                                                {{ ucfirst($subject->status) }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Enrollment Statistics -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title mb-0">Enrollment Statistics</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="text-center">
                                                <h4 class="text-primary">{{ $viewedLessons }}</h4>
                                                <p class="text-muted">Lessons Completed</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="text-center">
                                                <h4 class="text-success">{{ $totalLessons - $viewedLessons }}</h4>
                                                <p class="text-muted">Lessons Remaining</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="text-center">
                                                <h4 class="text-info">{{ round($progressPercentage, 1) }}%</h4>
                                                <p class="text-muted">Progress</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="text-center">
                                                <h4 class="text-warning">{{ $enrollment->created_at->format('M d, Y') }}</h4>
                                                <p class="text-muted">Enrollment Date</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Progress Bar -->
                                    <div class="mt-4">
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Overall Progress</span>
                                            <span>{{ round($progressPercentage, 1) }}%</span>
                                        </div>
                                        <div class="progress" style="height: 10px;">
                                            <div class="progress-bar bg-success" role="progressbar" 
                                                 style="width: {{ $progressPercentage }}%" 
                                                 aria-valuenow="{{ $progressPercentage }}" 
                                                 aria-valuemin="0" 
                                                 aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    @if($recentActivity->count() > 0)
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title mb-0">Recent Activity</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Lesson</th>
                                                    <th>Completed Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($recentActivity as $activity)
                                                <tr>
                                                    <td>{{ $activity->lesson->title }}</td>
                                                    <td>{{ $activity->created_at->format('M d, Y H:i') }}</td>
                                                    <td>
                                                        <span class="badge bg-success">Completed</span>
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
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 