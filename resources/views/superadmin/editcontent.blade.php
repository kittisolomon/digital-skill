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
                        <li class="breadcrumb-item active">Edit Content</li>
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
             <h5 class="card-title">Edit Course Content</h5>
            
             <form action="{{ route('admin.update.content', $content) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="course_id" value="{{ $content->course_id }}">

                <div class="col-md-12">
                    <label for="title" class="form-label">Content Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $content->title) }}">
                </div>
            
                <div class="col-md-12 mt-2">
                    <label for="videoLink" class="form-label">Video</label>
                    <input type="file" name="video_link" class="form-control" id="videoLink">
                    @if ($content->video_link)
                        <button type="button" class="btn btn-sm btn-warning mt-2" data-bs-toggle="modal" data-bs-target="#videoPreviewModal">
                            Preview Video
                        </button>
                    @endif
                </div>
                <div class="row">
                <div class="col-md-4 mt-2">
                    <label for="externalLink" class="form-label">External Link</label>
                    <input type="text" name="external_link" class="form-control" id="externalLink" value="{{ old('external_link', $content->content->external_link) }}">
                </div>
            
                <div class="col-md-4 mt-2">
                    <label for="attachement" class="form-label">Attachment (PDF)</label>
                    <input type="file" name="attachement" class="form-control" id="attachement">
                    @if (isset($content->content->attachement))
                        <a href="{{ asset($content->content->attachement) }}" target="_blank" class="btn btn-sm btn-secondary mt-2">
                            View PDF
                        </a>
                    @endif
                </div>
            
                <div class="col-md-4 mt-2">
                    <label for="position" class="form-label">Position</label>
                    <input type="text" name="position" class="form-control" id="position" value="{{ old('position', $content->position) }}">
                </div>
            </div>
                <div class="col-12 mt-2">
                    <label for="about" class="form-label">About Content</label>
                    <textarea name="about" class="form-control">{{ old('about', $content->about) }}</textarea>
                </div>
            
                <div class="col-12 mt-2">
                    <label for="notes" class="form-label">Notes</label>
                    <textarea name="notes" class="form-control tinymce-editor">{{ old('notes', $content->content->notes) }}</textarea>
                </div>
            
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Update Content</button>
                </div>
          </form>
          
        </div>
          </div>
        </div>

      </div>
    </div>

    {{-- video preview modal --}}
    <div class="modal fade" id="videoPreviewModal" tabindex="-1" aria-labelledby="videoPreviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="videoPreviewModalLabel">Video Preview</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
              <video controls width="100%">
                  <source src="{{ asset($content->video_link) }}" type="video/mp4">
                  Your browser does not support the video tag.
              </video>
            </div>
          </div>
        </div>
      </div>
      
  </section>
@endsection