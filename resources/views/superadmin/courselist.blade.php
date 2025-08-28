@extends('admin.index')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Course Management</a></li>
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
                <a href="{{ route('admin.addcontent', $course) }}" class="btn btn-primary">
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
                  <td><a href="{{ asset($content->video_link) }}" target="_blank"><button class="btn btn-warning btn-sm text-white"> view </button></a></td>
                  <td>{{ $course->created_at->format('Y-m-d') }}</td>
                  <td>
                    <a href="{{ route('admin.edit.content', $content) }}" class="btn btn-sm bg-warning"><i class="bi bi-pencil-square text-white"></i></a>
                    <form action="{{ route('admin.delete.content', $content) }}" method="POST" class="d-inline">
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
@endsection