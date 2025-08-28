@extends('admin.index')
@section('content')
<div class="card">
  <div class="card-body">
    <div class="d-flex justify-content-between align-items-center mt-4">
      <div>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">User Management</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.schools') }}">Schools</a></li>
            <li class="breadcrumb-item active">School Details</li>
          </ol>
        </nav>
      </div>
      <a href="{{ url()->previous() }}" class="btn btn-outline-primary">
        <i class="bi bi-arrow-left"></i> Back
      </a>
    </div>
  </div>
</div>

<section class="section profile">
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">
            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
            </li>
          </ul>

          <div class="tab-content pt-2">
            <div class="tab-pane fade show active profile-overview" id="profile-overview">
              <h5 class="card-title">School Details</h5>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">School Name</div>
                <div class="col-lg-9 col-md-8">{{ $school->schoolDetail->name }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Registration Number</div>
                <div class="col-lg-9 col-md-8">{{ $school->schoolDetail->reg_number }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">School Type</div>
                <div class="col-lg-9 col-md-8">{{ $school->schoolDetail->school_type }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Ownership Type</div>
                <div class="col-lg-9 col-md-8">{{ $school->schoolDetail->ownership_type }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Email</div>
                <div class="col-lg-9 col-md-8">{{ $school->schoolDetail->email }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Phone</div>
                <div class="col-lg-9 col-md-8">{{ $school->schoolDetail->phone_no }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">State</div>
                <div class="col-lg-9 col-md-8">{{ $school->schoolDetail->state }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">LGA</div>
                <div class="col-lg-9 col-md-8">{{ $school->schoolDetail->lga }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Address</div>
                <div class="col-lg-9 col-md-8">{{ $school->schoolDetail->address }}</div>
              </div>

              <h5 class="card-title mt-4">Administrator Details</h5>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Admin Name</div>
                <div class="col-lg-9 col-md-8">{{ $school->schoolDetail->admin_name }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Admin Phone</div>
                <div class="col-lg-9 col-md-8">{{ $school->schoolDetail->admin_phone }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Admin Email</div>
                <div class="col-lg-9 col-md-8">{{ $school->schoolDetail->admin_email }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Status</div>
                <div class="col-lg-9 col-md-8">
                  {{ $school->suspended ? 'Suspended' : 'Active' }}
                </div>
              </div>
            </div>

            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
              <!-- Profile Edit Form -->
              <form action="{{ route('admin.updateSchool', $school->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                  <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">School Logo</label>
                  <div class="col-md-8 col-lg-8">
                    <div class="d-flex justify-content-center align-items-center">
                      <div class="image-container" onclick="document.getElementById('fileInput').click();">
                        <img id="profileImage" src="{{ asset($school->schoolDetail->photo_link ?? 'backend/assets/img/no-image.png') }}" alt="School Logo">
                        <div class="overlay">Click to upload</div>
                      </div>
                      <input type="file" name="photo_link" id="fileInput" class="file-input" accept="image/*" onchange="previewImage(event)">
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="name" class="col-md-4 col-lg-3 col-form-label">School Name</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="name" type="text" class="form-control" id="name" value="{{ $school->schoolDetail->name }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="reg_number" class="col-md-4 col-lg-3 col-form-label">Registration Number</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="reg_number" type="text" class="form-control" id="reg_number" value="{{ $school->schoolDetail->reg_number }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="school_type" class="col-md-4 col-lg-3 col-form-label">School Type</label>
                  <div class="col-md-8 col-lg-9">
                    <select name="school_type" class="form-select" id="school_type">
                      <option value="Primary" {{ $school->schoolDetail->school_type == 'Primary' ? 'selected' : '' }}>Primary</option>
                      <option value="Secondary" {{ $school->schoolDetail->school_type == 'Secondary' ? 'selected' : '' }}>Secondary</option>
                      <option value="Tertiary" {{ $school->schoolDetail->school_type == 'Tertiary' ? 'selected' : '' }}>Tertiary</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="ownership_type" class="col-md-4 col-lg-3 col-form-label">Ownership Type</label>
                  <div class="col-md-8 col-lg-9">
                    <select name="ownership_type" class="form-select" id="ownership_type">
                      <option value="Public" {{ $school->schoolDetail->ownership_type == 'Public' ? 'selected' : '' }}>Public</option>
                      <option value="Private" {{ $school->schoolDetail->ownership_type == 'Private' ? 'selected' : '' }}>Private</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="email" class="col-md-4 col-lg-3 col-form-label">School Email</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="email" type="email" class="form-control" id="email" value="{{ $school->schoolDetail->email }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="phone_no" class="col-md-4 col-lg-3 col-form-label">School Phone</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="phone_no" type="text" class="form-control" id="phone_no" value="{{ $school->schoolDetail->phone_no }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="state" class="col-md-4 col-lg-3 col-form-label">State</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="state" type="text" class="form-control" id="state" value="{{ $school->schoolDetail->state }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="lga" class="col-md-4 col-lg-3 col-form-label">LGA</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="lga" type="text" class="form-control" id="lga" value="{{ $school->schoolDetail->lga }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="address" type="text" class="form-control" id="address" value="{{ $school->schoolDetail->address }}">
                  </div>
                </div>

                <h5 class="card-title mt-4">Administrator Details</h5>

                <div class="row mb-3">
                  <label for="admin_name" class="col-md-4 col-lg-3 col-form-label">Admin Name</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="admin_name" type="text" class="form-control" id="admin_name" value="{{ $school->schoolDetail->admin_name }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="admin_phone" class="col-md-4 col-lg-3 col-form-label">Admin Phone</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="admin_phone" type="text" class="form-control" id="admin_phone" value="{{ $school->schoolDetail->admin_phone }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="admin_email" class="col-md-4 col-lg-3 col-form-label">Admin Email</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="admin_email" type="email" class="form-control" id="admin_email" value="{{ $school->schoolDetail->admin_email }}">
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
              </form>
            </div>

            <div class="tab-pane fade pt-3" id="profile-change-password">
              <div class="row mb-3">
                <label class="col-md-4 col-lg-3 col-form-label">Reset Password</label>
                <div class="col-md-8 col-lg-9">
                  <form action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <input type="hidden" name="email" value="{{ $school->email }}">
                    <button type="submit" class="btn btn-warning">
                      <i class="bi bi-envelope"></i> Send Password Reset Link
                    </button>
                  </form>
                </div>
              </div>
            </div>

            <div class="tab-pane fade pt-3" id="profile-settings">
              <!-- Settings Form -->
              <form action="{{ route('admin.suspend.user', $school->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                  <label for="suspended" class="col-md-4 col-lg-3 col-form-label">
                    Suspend <span>{{ $school->name }}</span>
                  </label>
                  <div class="col-md-8 col-lg-9">
                    <div class="form-check">
                      <input 
                        class="form-check-input" 
                        type="checkbox" 
                        id="suspended" 
                        name="suspended" 
                        value="1" 
                        {{ $school->suspended ? 'checked' : '' }}
                      >
                      <label class="form-check-label" for="suspended">
                        Tick to suspend / Untick to unsuspend
                      </label>
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="reason" class="col-md-4 col-lg-3 col-form-label">Suspension Reason</label>
                  <div class="col-md-8 col-lg-9">
                    <textarea 
                      class="form-control" 
                      name="reason" 
                      id="reason" 
                      rows="4"
                      placeholder="Enter the reason for suspension..."
                    >{{ old('reason', $school->suspension_reason) }}</textarea>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
.image-container {
  position: relative;
  width: 150px;
  height: 150px;
  border-radius: 50%;
  overflow: hidden;
  cursor: pointer;
}

.image-container img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
  color: white;
  opacity: 0;
  transition: opacity 0.3s;
}

.image-container:hover .overlay {
  opacity: 1;
}

.file-input {
  display: none;
}
</style>

<script>
function previewImage(event) {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function(e) {
      document.getElementById('profileImage').src = e.target.result;
    }
    reader.readAsDataURL(file);
  }
}
</script>
@endsection 