@extends('admin.index')
@section('content')
<div class="card">
  <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mt-4">
          <div>
              <nav>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="">User Management</a></li>
                      <li class="breadcrumb-item active">Schools</li>
                  </ol>
              </nav>
          </div>
      </div>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Schools</h5>

    <!-- Table with hoverable rows -->
    <div class="table-responsive">
      <table class="table table-striped nowrap dt-responsive" id="schoolsTable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">School Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($schools as $school)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $school->name }}</td>
            <td>{{ $school->schoolDetail->email }}</td>
            <td>{{ $school->schoolDetail->phone_no }}</td>
            <td>
              <span class="badge {{ $school->suspended ? 'bg-danger' : 'bg-success' }}">
                {{ $school->suspended ? 'Suspended' : 'Active' }}
              </span>
            </td>
            <td>
              <div class="d-flex gap-2">
                <a href="{{ route('admin.schoolDetails', $school->id) }}" class="btn btn-sm bg-warning">
                  <i class="bi bi-pencil-square text-white"></i>
                </a>
                <form action="{{ route('delete.user', $school->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm bg-danger" onclick="return confirm('Are you sure you want to delete this school? This action cannot be undone.')">
                    <i class="bi bi-trash text-white"></i>
                  </button>
                </form>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- End Table with hoverable rows -->

  </div>
</div>
@endsection 