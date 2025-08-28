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
                      <li class="breadcrumb-item active">Visit Logs</li>
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
                    <h5 class="card-title mb-0">Logs & Tracking</h5>
                    <p class="mb-0">View all Logs here.</p>
                </div>
                {{-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addInstructors">
                    <i class="bi bi-plus-lg"></i> Add Instructor
                </button> --}}
            </div>
        
            <!-- Table with stripped rows -->
            <table id="visitlogs" class="table table-striped nowrap dt-responsive">
              <thead>
                <tr>
                 <th>S/N</th>
                  <th>User</th>
                  <th>IP</th>
                  <th>Agent</th>
                  <th>Platform</th>
                  <th>Visit</th>
                  <th>Referrer</th>
                  <th>Visit Time</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $visitlogs as $index => $log )
                <tr>
                 <td> {{ $index + 1 }} </td>
                  <td>{{ $log->user->name ?? 'Guest' }}</td>
                  <td>{{ $log->ip_address }}</td>
                  <td>{{ $log->user_agent }}</td>
                  <td>{{ $log->platform}}</td>
                  <td><span class="text-primary"> {{ $log->visited_url }} </span></td>
                  <td><span class="text-primary">{{ $log->referrer_url }} </span></td>
                  <td> {{ \Carbon\Carbon::parse($log->visit_time)->format('Y, F d, h:i A') }}</td>
                  <td>
                    <button class="btn btn-sm bg-warning"><i class="bi bi-pencil-square text-white"></i></button>
                    <button class="btn btn-sm bg-danger"><i class="bi bi-trash text-white"></i></button>
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

    {{-- Add Category Modal --}}
  <div class="modal fade" id="addInstructors" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title card-title">Add Instructors</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ route('store.instructor') }}" method="POST" >
            @csrf
          <div class="modal-body mb-4">
                <div class="col-12">
                <label for="inputNanme4" class="form-label"> Name</label>
                <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="col-12 mt-2">
                    <label for="inputNanme4" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" id="email">
                </div>
                <div class="col-12 mt-2">
                    <label for="inputNanme4" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                {{-- <div class="col-md-12 mt-2">
                    <label for="categorySelect" class="form-label">Role</label>
                    <select name="role" class="form-control" id="categorySelect">
                        <option value="">Select a role...</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ old('role') == $role->id ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                </div> --}}
          </div>
          
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Save Instructor</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  </section>
@endsection