@extends('admin.index')
@section('content')
<div class="card">
  <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mt-4">
          <div>
              {{-- <h3 class="mb-0">Dashboard</h3> --}}
              <nav>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('instructor.courses') }}">Logs & Tracking</a></li>
                      <li class="breadcrumb-item active">User Activities</li>
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
                    <h5 class="card-title mb-0">Activity Logs</h5>
                    <p class="mb-0">View all Activity Logs here.</p>
                </div>
                {{-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategory">
                    <i class="bi bi-plus-lg"></i> Add Category
                </button> --}}
            </div>
            <!-- Table with stripped rows -->
            <table class="table datatable table-hover">
              <thead>
                <tr>
                 <th>S/N</th>
                  <th>User</th>
                  <th>Action</th>
                  <!-- <th>Details</th> -->
                  <th>Date </th>
                  <!-- <th>Action</th> -->
                </tr>
              </thead>
              <tbody>
                @foreach ( $activities as $index => $activity )
                <tr>
                 <td> {{ $index + 1 }} </td>
                  <td>{{ $activity->user ? $activity->user->name : 'System' }}</td>
                  <td>{{ $activity->action }}</td>
                  <!-- <td>
                    @if($activity->details)
                        @if(isset($activity->details['interval']))
                            <span class="badge bg-info">Interval: {{ $activity->details['interval'] }}</span>
                        @endif
                        @if(isset($activity->details['backup_id']))
                            <span class="badge bg-success">Backup ID: {{ $activity->details['backup_id'] }}</span>
                        @endif
                        @if(isset($activity->details['filename']))
                            <small class="text-muted d-block">{{ $activity->details['filename'] }}</small>
                        @endif
                    @else
                        <span class="text-muted">No details</span>
                    @endif
                  </td> -->
                  <td>{{ $activity->created_at->format('Y-m-d H:i') }}</td>
                  <!-- <td>
                    <button class="btn btn-sm bg-warning"><i class="bi bi-pencil-square text-white"></i></button>
                    <button class="btn btn-sm bg-danger"><i class="bi bi-trash text-white"></i></button>
                </td> -->
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