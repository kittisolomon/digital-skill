@extends('school.index')
@section('content')
<div class="card">
  <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mt-4">
          <div>
              <nav>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="">Subject Management</a></li>
                      <li class="breadcrumb-item active">Subjects</li>
                  </ol>
              </nav>
          </div>
          <a href="{{ url()->previous() }}" class="btn btn-outline-primary">
              <i class="bi bi-arrow-left"></i> Back
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
                    <h5 class="card-title mb-0">Subjects</h5>
                    <p class="mb-0">View all subjects here.</p>
                </div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSubject">
                    <i class="bi bi-plus-lg"></i> Add Subject
                </button>
            </div>
            <!-- Table with stripped rows -->
            <table class="table datatable table-hover">
              <thead>
                <tr>
                 <th>S/N</th>
                  <th>Title</th>
                  <th>Teacher</th>
                  <th>Description</th>
                  <th>Tags</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $subjects as $index => $subject )
                <tr>
                 <td> {{ $index + 1 }} </td>
                  <td><a href="{{ route('school.subject.enrollment', ['subject' => $subject->id]) }}" class="text-primary">{{ $subject->title }}</a></td>
                  <td>{{ $subject->teacher->name ?? 'Not Assigned' }}</td>
                  <td>{{ Str::limit($subject->description, 50) ?? 'No description' }}</td>
                  <td>{{ $subject->tags ?? 'No tags' }}</td>
                  <td>
                    <span class="badge bg-{{ $subject->status === 'published' ? 'success' : 'warning' }}">
                        {{ ucfirst($subject->status) }}
                    </span>
                  </td>
                  <td>
                     <a href="{{ route('school.subject.edit', $subject)}}" class="btn btn-sm bg-warning"><i class="bi bi-pencil-square text-white"></i></a> 
                   
                    <form action="{{ route('school.subject.delete', $subject)}}" method="POST" class="d-inline">
                      @csrf
                      @method('DELETE')
                    <button class="btn btn-sm bg-danger"><i class="bi bi-trash text-white"></i></button>
                    </form>
                </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    {{-- Add Subject Modal --}}
  <div class="modal fade" id="addSubject" tabindex="-1">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title card-title">Add Subject</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ route('school.subject.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="modal-body mb-4">
          <div class="row">
                <div class="col-6">
                <label for="title" class="form-label">Subject Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}">
                </div>
                <div class="col-6">
                    <label for="teacher_id" class="form-label">Assign Teacher</label>
                    <select name="teacher_id" class="form-control" id="teacher_id">
                        <option value="">Select Teacher...</option>
                        @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                                {{ $teacher->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 mt-3">
                    <label for="description" class="form-label">Description</label> 
                    <textarea name="description" class="form-control" id="description" rows="3">{{ old('description') }}</textarea>
                </div>
                <div class="col-6 mt-3">
                    <label for="tags" class="form-label">Tags (comma separated)</label>
                    <input type="text" name="tags" class="form-control" id="tags" value="{{ old('tags') }}" placeholder="e.g., Mathematics, Science, Physics">
                </div>
                <div class="col-6 mt-3">
                    <label for="photo" class="form-label">Subject Photo</label>
                    <input type="file" name="photo" class="form-control" id="photo">
                </div>
            </div>
          </div>
          
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Save Subject</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  
</section>


@endsection 