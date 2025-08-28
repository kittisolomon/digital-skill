@extends('school.index')

@section('content')
<div class="card">
  <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mt-4">
          <div>
              <nav>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="">Subject Management</a></li>
                      <li class="breadcrumb-item"><a href="{{ route('school.subjects') }}">Subjects</a></li>
                      <li class="breadcrumb-item active">Enrolled Students</li>
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
                    <h5 class="card-title mb-0">Enrolled Students for {{ $subject->title }}</h5>
                    <p class="mb-0">View all enrolled students for this subject.</p>
                </div>
            </div>
            <!-- Table with stripped rows -->
            @if($enrolledStudents->count() > 0)
                <div class="table-responsive">
                    <table class="table datatable table-hover">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Enrolled Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($enrolledStudents as $index => $student)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>
                                        <span class="badge bg-{{ $student->pivot->status === 'active' ? 'success' : 'danger' }}">
                                            {{ ucfirst($student->pivot->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $student->pivot->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <a href="" 
                                           class="btn btn-sm btn-warning">
                                            <i class="bi bi-eye"></i> View Profile
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
              
            @else
                <div class="alert alert-info">
                    <i class="bi bi-info-circle"></i> No students are currently enrolled in this subject.
                </div>
            @endif
          </div>
        </div>
      </div>
    </div>
</section>
@endsection 