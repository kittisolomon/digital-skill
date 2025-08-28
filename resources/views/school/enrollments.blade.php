@extends('school.index')

@section('content')
<div class="card">
  <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mt-4">
          <div>
              <nav>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="">Subject Management</a></li>
                      <li class="breadcrumb-item active">All Enrollments</li>
                  </ol>
              </nav>
          </div>
          <a href="{{ route('school.subjects') }}" class="btn btn-outline-primary">
              <i class="bi bi-arrow-left"></i> Back to Subjects
          </a>
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
                    <h5 class="card-title mb-0">All Student Enrollments</h5>
                    <p class="mb-0">View all student enrollments across subjects.</p>
                </div>
            </div>
            <!-- Table with stripped rows -->
            @if($enrollments->count() > 0)
                <div class="table-responsive">
                    <table class="table datatable table-hover">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Student Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Progress</th>
                                <th>Status</th>
                                <th>Enrollment Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($enrollments as $index => $enrollment)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $enrollment->learner->name }}</td>
                                    <td>{{ $enrollment->learner->email }}</td>
                                    <td>{{ $enrollment->subject->title }}</td>
                                    <td>
                                        @php
                                            $totalLessons = $enrollment->subject->lessons->count();
                                            $completedLessons = \App\Models\ViewedLesson::where('user_id', $enrollment->learner->id)
                                                ->where('subject_id', $enrollment->subject->id)
                                                ->where('is_viewed', true)
                                                ->count();
                                            $progress = $totalLessons > 0 ? round(($completedLessons / $totalLessons) * 100, 1) : 0;
                                        @endphp
                                        <div class="text-center fw-bold mb-1">{{ $progress }}%</div>
                                        <div class="progress" style="height: 10px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $progress }}%" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $enrollment->status === 'active' ? 'success' : 'danger' }}">
                                            {{ ucfirst($enrollment->status) }}
                                        </span>
                                    </td>
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info">
                    <i class="bi bi-info-circle"></i> No enrollments found.
                </div>
            @endif
          </div>
        </div>
      </div>
    </div>
</section>
@endsection 