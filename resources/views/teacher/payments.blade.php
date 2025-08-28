@extends('instructor.index')
@section('content')
<div class="card">
  <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mt-4">
          <div>
              <nav>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="">Payments</a></li>
                      <li class="breadcrumb-item active">Course Sold</li>
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
                    <h5 class="card-title mb-0">Payments</h5>
                    <p class="mb-0">View all sold Payments here.</p>
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
                  <th>Transaction ID</th>
                  <th>Amount</th>
                  <th> Student Name</th>
                  <th> Student Email</th>
                  <th> Course</th>
                  <th> Status</th>
                  <th> Date</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($payHistories as $index => $history)
                <tr>
                 <td> {{ $index + 1 }} </td>
                  <td>{{ $history->reference }}</td>
                  <td>₦ {{number_format($history->transAmount, 2) }}</td>
                  <td>{{ $history->student->name }}</td>
                  <td>{{ $history->student->email }}</td>
                  <td> <span class="text-primary"> {{ $history->course->title }} </span></td>
                  <td>
                    @if($history->status == 0)
                    <span class="badge bg-success">Approved</span>
                    @else
                    <span class="badge bg-danger">Failed</span>
                    @endif
                  </td>
                  <td>{{ $history->created_at->format('Y-m-d') }}</td>
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