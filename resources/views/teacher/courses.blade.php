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
                      <li class="breadcrumb-item active">Courses</li>
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
                    <h5 class="card-title mb-0">Courses</h5>
                    <p class="mb-0">View all added courses here.</p>
                </div>
                <a href="{{ route('add.course') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Add Course
                </a>
            </div>
            <!-- Table with stripped rows -->
            <table class="table datatable table-hover">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Course Title</th>
                  <th>Category</th>
                  <th>Contents</th>
                  <th>Price</th>
                  <th>Cover</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($courses  as $index => $course)
                <tr>
                 <td> {{ $index + 1 }} </td>
                  <td> <a href="{{ route('list.course', $course)}}"> {{ $course->title }} </a></td>
                  <td>{{ $course->category->name}}</td>
                  <td>{{ $course->contents_count }}</td>
                  <td>
                    @if($course->is_paid == false)
                      {{ 'Free' }}
                    @else
                    ₦ {{ number_format($course->price, 2) }}
                    @endif

                  </td>
                  <td>
                    <img src="{{ asset($course->photo_link) }}" class="img-fluid" style="max-width: 50px;" alt="Image">
                </td>
                
                  <td>{{ $course->created_at->format('Y-m-d') }}</td>
                  <td>
                    <a href="{{ route('instructor.edit.course', $course) }}" class="btn btn-sm bg-warning"><i class="bi bi-pencil-square text-white"></i></a>
                    <form action="{{ route('instructor.delete.course', $course) }}" method="POST" class="d-inline">
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