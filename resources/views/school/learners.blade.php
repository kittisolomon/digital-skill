@extends('school.index')
@section('content')
<div class="card">
  <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mt-4">
          <div>
              <nav>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="">User Management</a></li>
                      <li class="breadcrumb-item active">Learners</li>
                  </ol>
              </nav>
          </div>
          <a href="{{ url()->previous() }}" class="btn btn-outline-primary">
              <i class="bi bi-arrow-left"></i> Back
          </a>
      </div>
  </div>
</div>

<section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h5 class="card-title mb-0">Learners</h5>
                    <p class="mb-0">View all added Learners here.</p>
                </div>
                <div>
                    <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#uploadLearners">
                        <i class="bi bi-upload"></i> Upload Learners
                    </button>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLearners">
                        <i class="bi bi-plus-lg"></i> Add Learner
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
                @foreach ($learners as $index => $learner)
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ $learner->name }}</td>
                  <td>{{ $learner->email }}</td>
                  <td>{{ $learner->learnerDetail->gender }}</td>
                  <td>{{ $learner->learnerDetail->phone ?? 'Not Set' }}</td>
                  <td>{{ $learner->learnerDetail->lga }}</td>
                  <td>
                    <a href="{{ route('school.learner.show', $learner) }}" class="btn btn-sm bg-warning"><i class="bi bi-pencil-square text-white"></i></a>
                    <form action="{{ route('school.user.delete', $learner) }}" method="POST" class="d-inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm bg-danger"><i class="bi bi-trash text-white"></i></button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    {{-- Upload Learners Modal --}}
    <div class="modal fade" id="uploadLearners" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Learners</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('school.learners.upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="csv_file" class="form-label">CSV File</label>
                            <input type="file" class="form-control" id="csv_file" name="csv_file" accept=".csv,.xlsx" required>
                            <small class="text-muted">
                                The CSV file should have the following columns: name, email, phone, gender, dob, state, lga, address, landmark
                            </small>
                        </div>
                        <div class="alert alert-info">
                            <h6 class="alert-heading">Instructions:</h6>
                            <ul class="mb-0">
                                <li>Download the <a href="{{ route('school.learners.template') }}" class="btn btn-sm btn-info">Download Template</a></li>
                                <li>Fill in the learner details following the template</li>
                                <li>Upload the completed file</li>
                                <li>Learners will receive welcome emails with their login credentials</li>
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

    {{-- Add Learner Modal --}}
    <div class="modal fade" id="addLearners" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title card-title">Add Learner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('school.learner.store') }}" method="POST">
                    @csrf
                    <div class="modal-body mb-4">
                        <div class="row">
                            <div class="col-4">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                            </div>
                            <div class="col-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">
                            </div>
                            <div class="col-4">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone') }}">
                            </div>
                            <div class="col-4 mt-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-control" name="gender">
                                    <option value="">Select Gender...</option>
                                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                </select>
                            </div>
                            <div class="col-4 mt-3">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" name="dob" class="form-control" id="dob" value="{{ old('dob') }}">
                            </div>
                            <div class="col-4 mt-3">
                                <label for="state" class="form-label">State</label>
                                <input type="text" name="state" class="form-control" id="state" value="{{ old('state') }}">
                            </div>
                            <div class="col-6 mt-3">
                                <label for="lga" class="form-label">LGA (Local Government Area)</label>
                                <input type="text" name="lga" class="form-control" id="lga" value="{{ old('lga') }}">
                            </div>
                            <div class="col-6 mt-3">
                                <label for="landmark" class="form-label">Landmark</label>
                                <input type="text" name="landmark" class="form-control" id="landmark" value="{{ old('landmark') }}">
                            </div>
                            <div class="col-12 mt-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea name="address" class="form-control" id="address">{{ old('address') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save Learner</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection 