@extends('instructor.index')
@section('content')

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                {{-- <h3 class="mb-0">Dashboard</h3> --}}
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('instructor.courses') }}">Course Management</a></li>
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
            
             <form action="{{ route('store.content', $course) }}" method="POST" class="row g-3" enctype="multipart/form-data">
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

    <!-- PDF Modal -->
    <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfModalLabel">PDF Preview</h5>
                    <div class="btn-group me-2" role="group">
                        <button type="button" class="btn btn-sm btn-outline-primary" id="direct-pdf-btn">Direct PDF</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary" id="google-docs-btn">Google Docs</button>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="pdf-loading" class="text-center" style="display: none;">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2">Loading PDF...</p>
                    </div>
                    <div id="pdf-error" class="text-center" style="display: none;">
                        <i class="bi bi-exclamation-triangle text-warning" style="font-size: 3rem;"></i>
                        <p class="mt-2">Unable to load PDF. <a href="#" id="pdf-download-link" target="_blank">Click here to download</a></p>
                    </div>
                    <iframe id="pdf-frame" src="" style="width:100%; height:70vh; display: none;" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>

    {{-- Add Course Modal --}}
    {{-- <div class="modal fade" id="addCourse" tabindex="-1">
      <div class="modal-dialog  modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Vertically Centered</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h5 class="card-title">Add a new Course</h5>
                <!-- Multi Columns Form -->
                <form class="row g-3">
                  <div class="col-md-12">
                    <label for="inputName5" class="form-label">Course Name</label>
                    <input type="text" name="title" class="form-control" id="courseName">
                  </div>
                  <div class="col-md-4">
                    <label for="inputEmail5" class="form-label">Price</label>
                    <input type="price" class="form-control" id="price">
                  </div>
                  <div class="col-md-4">
                    <label for="inputPassword5" class="form-label">Duration</label>
                    <input type="duration" class="form-control" id="duration">
                  </div>
                  <div class="col-md-4">
                    <label for="inputPassword5" class="form-label">Course Type</label>
                    <select id="isPaid" name="is_paid" class="form-control">
                      <option value="0">Free</option>  
                      <option value="1">Paid</option>  
                    </select>
                  </div>
                  <div class="col-md-12">
                    <label for="inputCity" class="form-label">Cover Photo</label>
                    <input type="file" name="photo_link" class="form-control" id="phontoLink">
                  </div>
                  <div class="col-12">
                    <label for="inputCity" class="form-label">Description</label>
                    <textarea class="form-control"> </textarea>
                  </div>
                  <div class="text-center">
                   
                  </div>
                </form>
                <!-- End Multi Columns Form -->
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn btn-danger">Close</button>
          </div>
        </div>
      </div>
    </div> --}}
  </section>
@endsection