@extends('admin.index')
@section('content')

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                {{-- <h3 class="mb-0">Dashboard</h3> --}}
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Course Management</a></li>
                        <li class="breadcrumb-item active">Course List</li>
                        <li class="breadcrumb-item active">Add Content</li>
                    </ol>
                </nav>
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-outline-primary">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>
    </div>
</div>
  <!-- End Page Title -->
<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
             {{-- add Course form --}}
             <h5 class="card-title">Add Course Content</h5>
            
             <form action="{{ route('admin.store.content', $course) }}" method="POST" class="row g-3" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="course_id" value="{{ $course->id }}">
              <div class="col-md-12">
                <label for="videoLink" class="form-label">Content Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ old('video_link') }}">
              </div>

              <div class="col-md-12">
                <label for="videoLink" class="form-label">Video</label>
                <input type="file" name="video_link" class="form-control" id="videoLink" value="{{ old('video_link') }}">
              </div>
          
              <div class="col-md-4">
                  <label for="externalLink" class="form-label">External Link</label>
                  <input type="text" name="external_link" class="form-control" id="externalLink" value="{{ old('external_link') }}">
              </div>

              <div class="col-md-4">
                <label for="attachement" class="form-label">Attachment</label> (PDF*)
                <input type="file"  name="attachement" class="form-control" id="attachement" value="{{ old('attachement') }}">
            </div>

              <div class="col-md-4">
                <label for="position" class="form-label">Position</label>
                <input type="text" name="position" class="form-control" id="position" value="{{ old('position') }}">
               </div>

               <div class="col-12">
                <label for="about" class="form-label">About Content</label>
                <textarea name="about" class="form-control">{{ old('about') }}</textarea>
              </div>
          
              <div class="col-12">
                  <label for="notes" class="form-label">Notes</label>
                  <textarea name="notes" class="form-control tinymce-editor">{{ old('notes') }}</textarea>
              </div>
          
              <div class="text-center"> 
                  <button type="submit" class="btn btn-success">Add Content</button>
              </div>
          </form>
          
        </div>
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection