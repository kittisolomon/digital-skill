@extends('school.index')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('school.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Completed Students</li>
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
                    <h5 class="card-title">Completed Students</h5>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Student Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <!-- <th>Completion Date</th> -->
                                    <th>Total Lessons</th>
                                    <th>Enrollment Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($completedEnrollments as $index => $enrollment)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $enrollment->learner->name }}</td>
                                    <td>{{ $enrollment->learner->email }}</td>
                                    <td>{{ $enrollment->subject->title }}</td>
                                    <!-- <td>{{ $completionDates[$enrollment->id] ?? 'N/A' }}</td> -->
                                    <td>{{ $enrollment->subject->lessons->count() }}</td>
                                    <td>{{ $enrollment->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <a href="{{ route('school.enrollment.details', $enrollment->id) }}" class="btn btn-sm btn-primary">
                                            <i class="bi bi-info-circle"></i> 
                                        </a>
                                        <a href="{{ route('school.enrollment.progress', $enrollment->id) }}" class="btn btn-sm btn-success">
                                            <i class="bi bi-graph-up"></i> 
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">No completed students found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 