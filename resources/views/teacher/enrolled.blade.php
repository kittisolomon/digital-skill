@extends('instructor.index')
@section('content')
<div class="card">
  <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mt-4">
          <div>
              <nav>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="">Enrollment</a></li>
                      <li class="breadcrumb-item active">Enrolled Students</li>
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
                    <h5 class="card-title mb-0">Enrolled Students</h5>
                    <p class="mb-0">View all added enrolled students here.</p>
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
                  <th>Course</th>
                  {{-- <th>Category</th> --}}
                  <th>  Name</th>
                  <th>  Email</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th> Date</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($enrollments as $index => $enrollment)
                <tr>
                 <td> {{ $index + 1 }} </td>
                  <td> <a href="" class="text-primary"> {{ $enrollment->course->title }} </a></td>
                  {{-- <td>{{ $enrollment->course->category->name }}</td> --}}
                  <td>{{ $enrollment->user->name }}</td>
                  <td>{{ $enrollment->user->email }}</td>
                  <td>
                    @if($enrollment->course->is_paid == false)
                    {{ 'Free' }}
                    @else
                    ₦ {{ number_format($enrollment->course->price, 2) }}
                    @endif
                  </td>
                  <td> <span class="badge bg-success"> {{ $enrollment->status }} </span> </td>
                  <td>{{ $enrollment->created_at->format('Y-m-d') }}</td>
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