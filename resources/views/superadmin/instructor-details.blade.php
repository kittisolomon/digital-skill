@extends('admin.index')
@section('content')
<div class="card">
  <div class="card-body">
    <div class="d-flex justify-content-between align-items-center mt-4">
      <div>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">User Management</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.instructors') }}">Instructors</a></li>
            <li class="breadcrumb-item active">Instructor Details</li>
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
              <h5 class="card-title">Instructor Details</h5>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Full Name</div>
                <div class="col-lg-9 col-md-8">{{ $instructor->name }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Qualification</div>
                <div class="col-lg-9 col-md-8">{{ $instructor->instructorDetail->qualification ?? '' }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Years of Experience</div>
                <div class="col-lg-9 col-md-8">{{ $instructor->instructorDetail->years_of_experience ?? '' }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Area of Expertise</div>
                <div class="col-lg-9 col-md-8">{{ $instructor->instructorDetail->area_of_expertise ?? '' }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Gender</div>
                <div class="col-lg-9 col-md-8">{{ $instructor->instructorDetail->gender ?? '' }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Company</div>
                <div class="col-lg-9 col-md-8">{{ $instructor->instructorDetail->company ?? '' }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Job</div>
                <div class="col-lg-9 col-md-8">{{ $instructor->instructorDetail->job ?? '' }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Country</div>
                <div class="col-lg-9 col-md-8">{{ $instructor->instructorDetail->country ?? '' }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">State</div>
                <div class="col-lg-9 col-md-8">{{ $instructor->instructorDetail->state ?? '' }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Address</div>
                <div class="col-lg-9 col-md-8">{{ $instructor->instructorDetail->address ?? '' }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Phone</div>
                <div class="col-lg-9 col-md-8">{{ $instructor->instructorDetail->phone ?? '' }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Email</div>
                <div class="col-lg-9 col-md-8">{{ $instructor->email }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">About</div>
                <div class="col-lg-9 col-md-8">{{ $instructor->instructorDetail->about ?? '' }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Social Media</div>
                <div class="col-lg-9 col-md-8">
                  @if($instructor->instructorDetail && $instructor->instructorDetail->twitter)
                    <a href="{{ $instructor->instructorDetail->twitter }}" target="_blank" class="me-2"><i class="bi bi-twitter"></i></a>
                  @endif
                  @if($instructor->instructorDetail && $instructor->instructorDetail->facebook)
                    <a href="{{ $instructor->instructorDetail->facebook }}" target="_blank" class="me-2"><i class="bi bi-facebook"></i></a>
                  @endif
                  @if($instructor->instructorDetail && $instructor->instructorDetail->linkedin)
                    <a href="{{ $instructor->instructorDetail->linkedin }}" target="_blank" class="me-2"><i class="bi bi-linkedin"></i></a>
                  @endif
                  @if($instructor->instructorDetail && $instructor->instructorDetail->github)
                    <a href="{{ $instructor->instructorDetail->github }}" target="_blank" class="me-2"><i class="bi bi-github"></i></a>
                  @endif
                </div>
              </div>
            </div>

            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
              <!-- Profile Edit Form -->
              <form action="{{ route('instructor.update', $instructor->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                  <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                  <div class="col-md-8 col-lg-8">
                    <div class="d-flex justify-content-center align-items-center">
                      <div class="image-container" onclick="document.getElementById('fileInput').click();">
                        <img id="profileImage" src="{{ asset($instructor->instructorDetail->photo_link ?? 'backend/assets/img/no-image.png') }}" alt="Profile Photo">
                        <div class="overlay">Click to upload</div>
                      </div>
                      <input type="file" name="photo_link" id="fileInput" class="file-input" accept="image/*" onchange="previewImage(event)">
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="name" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="name" type="text" class="form-control" id="name" value="{{ $instructor->name }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="qualification" class="col-md-4 col-lg-3 col-form-label">Qualification</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="qualification" type="text" class="form-control" id="qualification" value="{{ $instructor->instructorDetail->qualification ?? '' }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="years_of_experience" class="col-md-4 col-lg-3 col-form-label">Years of Experience</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="years_of_experience" type="number" class="form-control" id="years_of_experience" value="{{ $instructor->instructorDetail->years_of_experience ?? '' }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="area_of_expertise" class="col-md-4 col-lg-3 col-form-label">Area of Expertise</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="area_of_expertise" type="text" class="form-control" id="area_of_expertise" value="{{ $instructor->instructorDetail->area_of_expertise ?? '' }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="gender" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                  <div class="col-md-8 col-lg-9">
                    <select name="gender" class="form-select" id="gender">
                      <option value="male" {{ ($instructor->instructorDetail->gender ?? '') == 'male' ? 'selected' : '' }}>Male</option>
                      <option value="female" {{ ($instructor->instructorDetail->gender ?? '') == 'female' ? 'selected' : '' }}>Female</option>
                      <option value="other" {{ ($instructor->instructorDetail->gender ?? '') == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="company" type="text" class="form-control" id="company" value="{{ $instructor->instructorDetail->company ?? '' }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="job" type="text" class="form-control" id="job" value="{{ $instructor->instructorDetail->job ?? '' }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="country" type="text" class="form-control" id="country" value="{{ $instructor->instructorDetail->country ?? '' }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="state" class="col-md-4 col-lg-3 col-form-label">State</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="state" type="text" class="form-control" id="state" value="{{ $instructor->instructorDetail->state ?? '' }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="address" type="text" class="form-control" id="address" value="{{ $instructor->instructorDetail->address ?? '' }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="phone" type="text" class="form-control" id="phone" value="{{ $instructor->instructorDetail->phone ?? '' }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="email" type="email" class="form-control" id="email" value="{{ $instructor->email }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                  <div class="col-md-8 col-lg-9">
                    <textarea name="about" class="form-control" id="about" style="height: 100px">{{ $instructor->instructorDetail->about ?? '' }}</textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="twitter" class="col-md-4 col-lg-3 col-form-label">Twitter</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="twitter" type="url" class="form-control" id="twitter" value="{{ $instructor->instructorDetail->twitter ?? '' }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="facebook" class="col-md-4 col-lg-3 col-form-label">Facebook</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="facebook" type="url" class="form-control" id="facebook" value="{{ $instructor->instructorDetail->facebook ?? '' }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="linkedin" class="col-md-4 col-lg-3 col-form-label">LinkedIn</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="linkedin" type="url" class="form-control" id="linkedin" value="{{ $instructor->instructorDetail->linkedin ?? '' }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="github" class="col-md-4 col-lg-3 col-form-label">GitHub</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="github" type="url" class="form-control" id="github" value="{{ $instructor->instructorDetail->github ?? '' }}">
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
                    <input type="hidden" name="email" value="{{ $instructor->email }}">
                    <button type="submit" class="btn btn-warning">
                      <i class="bi bi-envelope"></i> Send Password Reset Link
                    </button>
                  </form>
                </div>
              </div>
            </div>

            <div class="tab-pane fade pt-3" id="profile-settings">
              <!-- Settings Form -->
              <form action="{{ route('admin.suspend.user', $instructor->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                  <label for="suspended" class="col-md-4 col-lg-3 col-form-label">
                    Suspend <span>{{ $instructor->name }}</span>
                  </label>
                  <div class="col-md-8 col-lg-9">
                    <div class="form-check">
                      <input 
                        class="form-check-input" 
                        type="checkbox" 
                        id="suspended" 
                        name="suspended" 
                        value="1" 
                        {{ $instructor->suspended ? 'checked' : '' }}
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
                    >{{ old('reason', $instructor->suspension_reason) }}</textarea>
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