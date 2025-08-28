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

  <section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h5 class="card-title mb-0">Subjects</h5>
                            <p class="mb-0">Update subject here.</p>
                        </div>
                        {{-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSubject">
                            <i class="bi bi-plus-lg"></i> Add Subject
                        </button> --}}
                    </div>

                    <form action="{{ route('subjects.update', $subject->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Title -->
                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label">Subject Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $subject->title) }}" required>
                            </div>

                            <!-- Teacher -->
                            <div class="col-md-6 mb-3">
                                <label for="teacher_id" class="form-label">Assigned Teacher</label>
                                <select name="teacher_id" id="teacher_id" class="form-select" required>
                                    <option value="">Select a teacher</option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}" {{ $subject->teacher_id == $teacher->id ? 'selected' : '' }}>
                                            {{ $teacher->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Tags -->
                            <div class="col-12 mb-3">
                                <label for="tags" class="form-label">Tags (optional)</label>
                                <input type="text" class="form-control" id="tags" name="tags" value="{{ old('tags', $subject->tags) }}">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select" required>
                                    <option value="">Select status</option>
                                    <option value="draft" {{ $subject->status === 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="published" {{ $subject->status === 'published' ? 'selected' : '' }}>Published</option>
                                </select>
                            </div>

                            <!-- Photo -->
                            <div class="col-12 mb-3">
                                <label for="photo" class="form-label">Change Photo (optional)</label>
                                <input type="file" class="form-control" id="photo" name="photo">
                            
                                @if ($subject->photo_link)
                                    <div class="mt-2 d-flex align-items-center gap-2">
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#photoPreviewModal">
                                            Preview Photo
                                        </button>
                                        
                                    </div>
                                @endif
                            </div>

                            <!-- Description -->
                            <div class="col-12 mb-3">
                                <label for="description" class="form-label">Description (optional)</label>
                                <textarea class="form-control" name="description" id="description" rows="3">{{ old('description', $subject->description) }}</textarea>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-success">Update Subject</button>
                                <a href="{{ route('school.subjects') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    @if ($subject->photo_link)
<div class="modal fade" id="photoPreviewModal" tabindex="-1" aria-labelledby="photoPreviewModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="photoPreviewModalLabel">Subject Photo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <img src="{{ asset($subject->photo_link) }}" alt="Current Subject Photo" class="img-fluid" style="max-height: 400px;">
      </div>
    </div>
  </div>
</div>
@endif
</section>

@endsection 