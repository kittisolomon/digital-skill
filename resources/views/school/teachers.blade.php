@extends('school.index')
@section('content')
<div class="card">
  <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mt-4">
          <div>
              {{-- <h3 class="mb-0">Dashboard</h3> --}}
              <nav>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="">User Management</a></li>
                      <li class="breadcrumb-item active">Teachers</li>
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
                    <h5 class="card-title mb-0">Teacher</h5>
                    <p class="mb-0">View all added Teachers here.</p>
                </div>
                <div>
                    <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#uploadTeachers">
                        <i class="bi bi-upload"></i> Upload Teachers
                    </button>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addInstructors">
                        <i class="bi bi-plus-lg"></i> Add Teacher
                    </button>
                </div>
            </div>
            <!-- Table with stripped rows -->
            <table class="table datatable table-hover">
              <thead>
                <tr>
                 <th>S/N</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>Phone</th>
                  <th>LGA</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $teachers as $index => $teacher )
                <tr>
                 <td> {{ $index + 1 }} </td>
                  <td>{{ $teacher->name }}</td>
                  <td>{{ $teacher->email }}</td>
                  <td>{{ $teacher->teacherDetail->gender }}</td>
                  <td>{{ $teacher->teacherDetail->phone ?? 'Not Set' }}</td>
                  <td>{{ $teacher->teacherDetail->lga }}</td>
                  <td>
                    <a href="{{ route('school.teacher.show', $teacher) }}" class="btn btn-sm bg-warning"><i class="bi bi-pencil-square text-white"></i></a>
                    <form action="{{ route('school.user.delete', $teacher) }}" method="POST" class="d-inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm bg-danger"><i class="bi bi-trash text-white"></i></button>
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

    {{-- Upload Teachers Modal --}}
    <div class="modal fade" id="uploadTeachers" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Teachers</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('school.teachers.upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="csv_file" class="form-label">CSV File</label>
                            <input type="file" class="form-control" id="csv_file" name="csv_file" accept=".csv,.xlsx" required>
                            <small class="text-muted">
                                The CSV file should have the following columns: name, email, phone, gender, state, lga, address
                            </small>
                        </div>
                        <div class="alert alert-info">
                            <h6 class="alert-heading">Instructions:</h6>
                            <ul class="mb-0">
                                <li>Download the <a href="{{ route('school.teachers.template') }}" class="btn btn-sm btn-info">Download Template</a></li>
                                <li>Fill in the teacher details following the template</li>
                                <li>Upload the completed file</li>
                                <li>Teachers will receive welcome emails with their login credentials</li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Add Category Modal --}}
  <div class="modal fade" id="addInstructors" tabindex="-1">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title card-title">Add Teacher</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ route('school.teacher.store') }}" method="POST" >
            @csrf
          <div class="modal-body mb-4">
          <div class="row">
                <div class="col-4">
                <label for="inputNanme4" class="form-label"> Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                </div>
                <div class="col-4 ">
                    <label for="inputNanme4" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" id="email" value="{{ old('email') }}">
                </div>
                <div class="col-4">
                    <label for="inputNanme4" class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone') }}">
                </div>
                <div class="col-4 mt-3">
                    <label for="inputNanme4" class="form-label"> Gender</label>
                    <select class="form-control" name="gender"> 
                        <option value=""> Select Gender...</option>
                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                    </select>
                    </div>
                    <div class="col-4 mt-3">
                        <label for="inputNanme4" class="form-label">State</label>
                    <input type="text" name="state" class="form-control" id="state" value="{{ old('state') }}">
                    </div>
                    <div class="col-4 mt-3">
                        <label for="inputNanme4" class="form-label">LGA (Local Government Area)</label>
                    <input type="text" name="lga" class="form-control" id="lga" value="{{ old('lga') }}">
                    </div>
                    <div class="col-12 mt-3">
                        <label for="inputNanme4" class="form-label">Address</label> 
                    <textarea name="address" class="form-control" id="address">{{ old('address') }}</textarea>
                    </div>
            </div>
          </div>
          
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Save Teacher</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  </section>
@endsection