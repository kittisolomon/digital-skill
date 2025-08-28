@extends('school.index')
@section('content')
<style>
  .image-container {
      position: relative;
      width: 120px;
      height: 120px;
      border-radius: 50%;
      overflow: hidden;
      cursor: pointer;
      border: 3px solid #ddd;
  }

  .image-container img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 50%;
      transition: opacity 0.3s ease-in-out;
  }

  .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 14px;
      border-radius: 50%;
      opacity: 0;
      transition: opacity 0.3s ease-in-out;
  }

  .image-container:hover .overlay {
      opacity: 1;
  }

  .file-input {
      display: none;
  }
</style>

<div class="card">
  <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mt-4">
          <div>
              <nav>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="">Profile</a></li>
                      <li class="breadcrumb-item active">Profile Details</li>
                      <li class="breadcrumb-item active">{{ $user->name }}</li>
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
    <div class="col-xl-4">
      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
          <img src="{{ asset($school_details->photo_link ?? 'backend/assets/img/no-image.png') }}" alt="Profile" style="width: 120px; height: 120px; object-fit: cover;" class="rounded-circle">
          <h2>{{ $school_details->name }}</h2>
          <h3>{{ $school_details->school_type }}</h3>
        </div>
      </div>
    </div>

    <div class="col-xl-8">
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
          </ul>

          <div class="tab-content pt-2">
            <div class="tab-pane fade show active profile-overview" id="profile-overview">
              <h5 class="card-title">School Details</h5>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">School Name</div>
                <div class="col-lg-9 col-md-8">{{ $school_details->name }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Registration Number</div>
                <div class="col-lg-9 col-md-8">{{ $school_details->reg_number }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">School Type</div>
                <div class="col-lg-9 col-md-8">{{ $school_details->school_type }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Ownership Type</div>
                <div class="col-lg-9 col-md-8">{{ $school_details->ownership_type }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Email</div>
                <div class="col-lg-9 col-md-8">{{ $school_details->email }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Phone</div>
                <div class="col-lg-9 col-md-8">{{ $school_details->phone_no }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">State</div>
                <div class="col-lg-9 col-md-8">{{ $school_details->state }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">LGA</div>
                <div class="col-lg-9 col-md-8">{{ $school_details->lga }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Address</div>
                <div class="col-lg-9 col-md-8">{{ $school_details->address }}</div>
              </div>

              <h5 class="card-title mt-4">Administrator Details</h5>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Admin Name</div>
                <div class="col-lg-9 col-md-8">{{ $school_details->admin_name }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Admin Phone</div>
                <div class="col-lg-9 col-md-8">{{ $school_details->admin_phone }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Admin Email</div>
                <div class="col-lg-9 col-md-8">{{ $school_details->admin_email }}</div>
              </div>
            </div>

            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
              <!-- Profile Edit Form -->
              <form action="{{ route('school.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                  <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">School Logo</label>
                  <div class="col-md-8 col-lg-8">
                    <div class="d-flex justify-content-center align-items-center">
                      <div class="image-container" onclick="document.getElementById('fileInput').click();">
                        <img id="profileImage" src="{{ asset($school_details->photo_link ?? 'backend/assets/img/no-image.png') }}" alt="School Logo">
                        <div class="overlay">Click to upload</div>
                      </div>
                      <input type="file" name="photo_link" id="fileInput" class="file-input" accept="image/*" onchange="previewImage(event)">
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="name" class="col-md-4 col-lg-3 col-form-label">School Name</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="name" type="text" class="form-control" id="name" value="{{ $school_details->name }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="reg_number" class="col-md-4 col-lg-3 col-form-label">Registration Number</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="reg_number" type="text" class="form-control" id="reg_number" value="{{ $school_details->reg_number }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="school_type" class="col-md-4 col-lg-3 col-form-label">School Type</label>
                  <div class="col-md-8 col-lg-9">
                    <select name="school_type" class="form-select" id="school_type">
                      <option value="Primary" {{ $school_details->school_type == 'Primary' ? 'selected' : '' }}>Primary</option>
                      <option value="Secondary" {{ $school_details->school_type == 'Secondary' ? 'selected' : '' }}>Secondary</option>
                      <option value="Tertiary" {{ $school_details->school_type == 'Tertiary' ? 'selected' : '' }}>Tertiary</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="ownership_type" class="col-md-4 col-lg-3 col-form-label">Ownership Type</label>
                  <div class="col-md-8 col-lg-9">
                    <select name="ownership_type" class="form-select" id="ownership_type">
                      <option value="Public" {{ $school_details->ownership_type == 'Public' ? 'selected' : '' }}>Public</option>
                      <option value="Private" {{ $school_details->ownership_type == 'Private' ? 'selected' : '' }}>Private</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="email" class="col-md-4 col-lg-3 col-form-label">School Email</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="email" type="email" class="form-control" id="email" value="{{ $school_details->email }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="phone_no" class="col-md-4 col-lg-3 col-form-label">School Phone</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="phone_no" type="text" class="form-control" id="phone_no" value="{{ $school_details->phone_no }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="state" class="col-md-4 col-lg-3 col-form-label">State</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="state" type="text" class="form-control" id="state" value="{{ $school_details->state }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="lga" class="col-md-4 col-lg-3 col-form-label">LGA</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="lga" type="text" class="form-control" id="lga" value="{{ $school_details->lga }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="address" type="text" class="form-control" id="address" value="{{ $school_details->address }}">
                  </div>
                </div>

                <h5 class="card-title mt-4">Administrator Details</h5>

                <div class="row mb-3">
                  <label for="admin_name" class="col-md-4 col-lg-3 col-form-label">Admin Name</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="admin_name" type="text" class="form-control" id="admin_name" value="{{ $school_details->admin_name }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="admin_phone" class="col-md-4 col-lg-3 col-form-label">Admin Phone</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="admin_phone" type="text" class="form-control" id="admin_phone" value="{{ $school_details->admin_phone }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="admin_email" class="col-md-4 col-lg-3 col-form-label">Admin Email</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="admin_email" type="email" class="form-control" id="admin_email" value="{{ $school_details->admin_email }}">
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
              </form>
            </div>

            <div class="tab-pane fade pt-3" id="profile-change-password">
              <!-- Change Password Form -->
              <form action="{{ route('school.password.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                  <label for="current_password" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="current_password" type="password" class="form-control" id="current_password">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="password" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="password" type="password" class="form-control" id="password">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="password_confirmation" class="col-md-4 col-lg-3 col-form-label">Confirm New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

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