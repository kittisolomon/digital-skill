@extends('learner.index')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('learner.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">My Assignments</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h5 class="card-title mb-0">My Assignments</h5>
                            <p class="mb-0">View and submit your assignments.</p>
                        </div>
                    </div>

                    <!-- Table with stripped rows -->
                    <table class="table datatable table-hover">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Subject</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Deadline</th>
                              
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assignments as $index => $assignment)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <div>
                                            <strong>{{ $assignment->lesson->subject->title }}</strong>
                                            <br>
                                            <small class="text-muted">{{ $assignment->lesson->title }}</small>
                                        </div>
                                    </td>
                                    <td>{{ $assignment->title }}</td>
                                    <td>{{ Str::limit($assignment->description, 20) }}</td>
                                    <td>
                                        <div class="{{ now()->isAfter($assignment->deadline) ? 'text-danger' : 'text-success' }}">
                                            <i class="bi bi-calendar-event me-1"></i>
                                            {{ $assignment->deadline->format('M j, Y') }}
                                            <br>
                                            <small>{{ $assignment->deadline->format('g:i A') }}</small>
                                        </div>
                                    </td>
                                   
                                    <td>
                                        @php
                                            $submission = $assignment->submissions->where('student_id', auth()->id())->first();
                                        @endphp
                                        @if($submission)
                                            @if($submission->status === 'graded')
                                                <span class="badge bg-success">
                                                    <i class="bi bi-check-circle me-1"></i>Graded ({{ $submission->grade }}%)
                                                </span>
                                            @else
                                                <span class="badge bg-warning">
                                                    <i class="bi bi-clock me-1"></i>Submitted
                                                </span>
                                            @endif
                                        @else
                                            @if(now()->isAfter($assignment->deadline))
                                                <span class="badge bg-danger">
                                                    <i class="bi bi-exclamation-triangle me-1"></i>Overdue
                                                </span>
                                            @else
                                                <span class="badge bg-secondary">
                                                    <i class="bi bi-hourglass-split me-1"></i>Pending
                                                </span>
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="{{ route('learner.assignment.view', $assignment) }}" class="btn btn-sm btn-primary" title="View Assignment">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            @if($assignment->file_link)
                                                <a href="{{ route('learner.download', ['type' => 'assignment', 'id' => $assignment->id]) }}" class="btn btn-sm btn-outline-secondary" title="Download Files">
                                                    <i class="bi bi-download"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 