@extends('instructor.index')
@section('content')
<div class="card">
  <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mt-4">
          <div>
              <nav>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="">Course Management</a></li>
                      <li class="breadcrumb-item active">Course Reviews</li>
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
                    <h5 class="card-title mb-0">Course Reviews</h5>
                    <p class="mb-0">View all course reviews here.</p>
                </div>
                {{-- <a href="" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Add Course
                </a> --}}
            </div>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                    <th>S/N</th>
                  {{-- <th>
                    Cover
                  </th> --}}
                  <th>Reviewer</th>
                  <th>Course</th>
                  <th> Rating</th>
                  <th> Comment</th>
                  <th>Enrolled Date</th>
                 
                </tr>
              </thead>
              <tbody>
                @foreach ( $reviews as $index => $review )
                <tr>
                 <td> {{ $index + 1 }} </td>
                  <td>{{ $review->user->name }}</td>
                  <td>{{ $review->course->title }}</td>
                  <td>{{ $review->rating }}</td>
                  <td>{{ $review->comment}}</td>
                  <td>{{ $review->created_at->format('Y-m-d') }}</td>
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