@extends('learner.index')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('learner.assignments') }}">My Assignments</a></li>
                        <li class="breadcrumb-item active">{{ $assignment->title }}</li>
                    </ol>
                </nav>
            </div>
            <a href="{{ route('learner.assignments') }}" class="btn btn-outline-primary">
                <i class="bi bi-arrow-left"></i> Back to Assignments
            </a>
        </div>
    </div>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h4 class="card-title mb-1">{{ $assignment->title }}</h4>
                            <p class="text-muted mb-0">{{ $assignment->lesson->subject->title }}</p>
                        </div>
                        <div class="text-end">
                            @php
                                $submission = $assignment->submissions->where('student_id', auth()->id())->first();
                            @endphp
                            @if($submission)
                                <span class="badge bg-success">Submitted</span>
                                <p class="text-muted mt-2 mb-0">Submitted on: {{ $submission->created_at->format('F j, Y g:i A') }}</p>
                            @else
                                <span class="badge bg-warning">Pending</span>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h6 class="card-title">Assignment Details</h6>
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-2">
                                            <i class="bi bi-calendar-event me-2"></i>
                                            <strong>Deadline:</strong> 
                                            <span class="{{ now()->isAfter($assignment->deadline) ? 'text-danger' : 'text-success' }}">
                                                {{ $assignment->deadline->format('F j, Y g:i A') }}
                                            </span>
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-person me-2"></i>
                                            <strong>Teacher:</strong> {{ $assignment->teacher->name }}
                                        </li>
                                        <li>
                                            <i class="bi bi-book me-2"></i>
                                            <strong>Lesson:</strong> {{ $assignment->lesson->title }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h6 class="card-title">Submission Status</h6>
                                    @if($submission)
                                        <div class="card mb-4 border-0 shadow-sm">
                                            <div class="card-body">
                                                <h6 class="card-title text-colour mb-3">
                                                    <i class="bi bi-check-circle me-2"></i>
                                                    Submission Status
                                                </h6>
                                                <div class="d-flex align-items-center mb-3">
                                                    @if($submission->status === 'graded')
                                                        <span class="badge bg-success me-2">
                                                            <i class="bi bi-check-circle me-1"></i>Graded
                                                        </span>
                                                        <div class="ms-3">
                                                            <strong class="text-success">Grade: {{ $submission->grade }}%</strong>
                                                            <br>
                                                            <small class="text-muted">
                                                                <i class="bi bi-calendar-check me-1"></i>
                                                                Graded on: {{ $submission->updated_at->format('F j, Y g:i A') }}
                                                            </small>
                                                        </div>
                                                    @else
                                                        <span class="badge bg-warning me-2">
                                                            <i class="bi bi-clock me-1"></i>Submitted
                                                        </span>
                                                        <div class="ms-3">
                                                            <small class="text-muted">
                                                                <i class="bi bi-clock me-1"></i>
                                                                Submitted on: {{ $submission->created_at->format('F j, Y g:i A') }}
                                                            </small>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        @if($submission->file_link)
                                            <div class="card mb-4 border-0 shadow-sm">
                                                <div class="card-body">
                                                    <h6 class="card-title text-colour mb-3">
                                                        <i class="bi bi-file-earmark-arrow-up me-2"></i>
                                                        Your Submission
                                                    </h6>
                                                    <div class="d-flex gap-2 flex-wrap">
                                                        <a href="{{ route('learner.download', ['type' => 'submission', 'id' => $submission->id]) }}" class="btn btn-sm btn-outline-primary">
                                                            <i class="bi bi-download me-1"></i> Download My Submission
                                                        </a>
                                                        <a href="{{ $submission->file_link }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                                                            <i class="bi bi-eye me-1"></i> Preview
                                                        </a>
                                                    </div>
                                                    @if($submission->learner_comments)
                                                        <div class="mt-3">
                                                            <strong>Your Comments:</strong>
                                                            <p class="text-muted mb-0 mt-1">{{ $submission->learner_comments }}</p>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif

                                        @if($submission->teacher_comments)
                                            <div class="card mb-4 border-0 shadow-sm">
                                                <div class="card-body">
                                                    <h6 class="card-title text-colour mb-3">
                                                        <i class="bi bi-chat-left-text me-2"></i>
                                                        Teacher Feedback
                                                    </h6>
                                                    <div class="alert alert-light border">
                                                        <i class="bi bi-quote me-2 text-muted"></i>
                                                        {{ $submission->teacher_comments }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @else
                                        <p class="mb-0">
                                            <i class="bi bi-exclamation-circle me-2 text-warning"></i>
                                            You haven't submitted this assignment yet.
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Assignment Information</h5>
                            
                            @if($assignment->description)
                                <div class="mb-4">
                                    <h6 class="text-primary mb-2">
                                        <i class="bi bi-file-text me-2"></i>Description
                                    </h6>
                                    <div class="content">
                                        {!! $assignment->description !!}
                                    </div>
                                </div>
                            @endif

                            @if($assignment->content)
                                <div class="mb-4">
                                     <h6 class="text-primary mb-2">
                                        <i class="bi bi-file-earmark-text me-2"></i>Assignment Instructoions
                                    </h6>
                                    <div class="content">
                                        {!! $assignment->content !!}
                                    </div>
                                </div>
                            @endif

                            @if($assignment->file_link)
                                <div class="mb-4">
                                    <h6 class="text-primary mb-2">
                                        <i class="bi bi-file-earmark-arrow-down me-2"></i>Assignment Files
                                    </h6>
                                    <div class="d-flex gap-2 flex-wrap">
                                        <a href="{{ route('learner.download', ['type' => 'assignment', 'id' => $assignment->id]) }}" class="btn btn-outline-primary">
                                            <i class="bi bi-download me-2"></i> Download Assignment
                                        </a>
                                        <a href="{{ $assignment->file_link }}" target="_blank" class="btn btn-outline-secondary">
                                            <i class="bi bi-eye me-2"></i> Preview
                                        </a>
                                    </div>
                                    <small class="text-muted mt-2 d-block">
                                        <i class="bi bi-info-circle me-1"></i>
                                        Click "Download" to save the file to your device, or "Preview" to view it in a new tab.
                                    </small>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        @if(!$submission && !now()->isAfter($assignment->deadline))
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#submitModal">
                                <i class="bi bi-upload"></i> Submit Assignment
                            </button>
                        @elseif($submission)
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle"></i> You have already submitted this assignment.
                            </div>
                        @elseif(now()->isAfter($assignment->deadline))
                            <div class="alert alert-warning">
                                <i class="bi bi-exclamation-triangle"></i> The submission deadline has passed.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Submit Assignment Modal -->
<div class="modal fade" id="submitModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Submit Assignment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('learner.assignment.submit', $assignment) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="alert alert-info">
                        <h6 class="alert-heading"><i class="bi bi-info-circle"></i> Submission Guidelines</h6>
                        <ul class="mb-0">
                            <li>Submit your work in PDF or Word Document format</li>
                            <li>Maximum file size: 10MB</li>
                            <li>Make sure your submission is complete and properly formatted</li>
                            <li>You can only submit once.</li>
                            <li>Ensure you submit before the deadline: {{ $assignment->deadline->format('F j, Y g:i A') }}</li>
                        </ul>
                    </div>

                    <div class="mb-3">
                        <label for="submission_file" class="form-label">Upload Your Work</label>
                        <input type="file" class="form-control @error('submission_file') is-invalid @enderror" 
                               id="submission_file" name="submission_file" accept=".pdf,.doc,.docx" required>
                        <div class="form-text">Accepted formats: PDF, Word Document (max 10MB)</div>
                        @error('submission_file')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="comments" class="form-label">Additional Comments (Optional)</label>
                        <textarea class="form-control" id="comments" name="learner_comments" rows="3" 
                                  placeholder="Add any additional notes or comments about your submission"></textarea>
                        <div class="form-text">You can provide any additional context or notes about your submission</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-upload"></i> Submit Assignment
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 