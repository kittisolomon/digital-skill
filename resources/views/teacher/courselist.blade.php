@extends('instructor.index')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('instructor.courses') }}">Course Management</a></li>
                        <li class="breadcrumb-item active">Course Content</li>
                        <li class="breadcrumb-item active">{{ $course->title }}</li>
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
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h5 class="card-title mb-0">Course Content</h5>
                    <p class="mb-0">View all added course content here.</p>
                </div>
                <a href="{{ route('instructor.addcontent', $course) }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Add Content
                </a>
            </div>
            <!-- Table with stripped rows -->
            <table class="table datatable table-hover">
              <thead>
                <tr>
                <th>S/N</th>
                  <th>Title</th>
                  <th>Position</th>
                  <th>Video</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($courseContents  as $index => $content)
                <tr>
                 <td> {{ $index + 1 }} </td>
                  <td> {{ $content->title }} </td>
                  <td>{{ $content->position}}</td>
                  <td>
                    <button class="btn btn-warning btn-sm text-white" 
                            data-bs-toggle="modal" 
                            data-bs-target="#videoModal" 
                            data-video-url="{{ asset($content->video_link) }}" 
                            data-video-title="{{ $content->title }}">
                        <i class="bi bi-play-circle"></i> View
                    </button>
                  </td>
                  <td>{{ $course->created_at->format('Y-m-d') }}</td>
                  <td>
                    <a href="{{ route('instructor.edit.content', $content) }}" class="btn btn-sm bg-warning"><i class="bi bi-pencil-square text-white"></i></a>
                    <form action="{{ route('instructor.delete.content', $content) }}" method="POST" class="d-inline">
                      @csrf
                      @method('DELETE')
                    <button class="btn btn-sm bg-danger"><i class="bi bi-trash text-white"></i></button>
                    </form>                 
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

  <!-- Video Modal -->
  <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="videoModalLabel">Video Player</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="ratio ratio-16x9">
            <video id="videoPlayer" controls class="w-100">
              <source id="videoSource" src="" type="video/mp4">
              Your browser does not support the video tag.
            </video>
          </div>
        </div>
        <div class="modal-footer">
         
        </div>
      </div>
    </div>
  </div>
@endsection