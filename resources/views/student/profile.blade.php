@extends('learner.index')
@section('content')
<div class="card">
  <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mt-4">
          <div>
              <nav>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">Profile</a></li>
                      <li class="breadcrumb-item active">My Profile</li>
                  </ol>
              </nav>
          </div>
      </div>
  </div>
</div>

<section class="section profile">
  <div class="row">
    <div class="col-xl-4">
      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
          @if($learner_details->photo_link)
            <img src="{{$learner_details->photo_link }}" alt="Profile" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
          @else
            <i class="bx bx-user-circle text-muted" style="font-size: 50px;"></i>
          @endif
          <h2>{{ $user->name }}</h2>
          <h3>{{ $user->LearnerDetail->school->name }}</h3>
        </div>
      </div>
    </div>

    <div class="col-xl-8">
      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">
            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#overview">Overview</button>
            </li>
            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#edit-profile">Edit Profile</button>
            </li>
            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#change-password">Change Password</button>
            </li>
          </ul>
          <div class="tab-content pt-2">
            {{-- Overview --}}
            <div class="tab-pane fade show active" id="overview">
              <h5 class="card-title">Learner Details</h5>
              <div class="row">
                <div class="col-lg-3 col-md-4 label">Full Name</div>
                <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
              </div>
              <div class="row mt-3">
                <div class="col-lg-3 col-md-4 label">Phone</div>
                <div class="col-lg-9 col-md-8">{{ $learner_details->phone }}</div>
              </div>
              <div class="row mt-3">
                <div class="col-lg-3 col-md-4 label">Gender</div>
                <div class="col-lg-9 col-md-8">{{ ucfirst($learner_details->gender) }}</div>
              </div>
              <div class="row mt-3">
                <div class="col-lg-3 col-md-4 label">Date of Birth</div>
                <div class="col-lg-9 col-md-8">{{ $learner_details->dob }}</div>
              </div>
              <div class="row mt-3">
                <div class="col-lg-3 col-md-4 label">State</div>
                <div class="col-lg-9 col-md-8">{{ $learner_details->state }}</div>
              </div>
              <div class="row mt-3">
                <div class="col-lg-3 col-md-4 label">LGA</div>
                <div class="col-lg-9 col-md-8">{{ $learner_details->lga }}</div>
              </div>
              <div class="row mt-3">
                <div class="col-lg-3 col-md-4 label">Address</div>
                <div class="col-lg-9 col-md-8">{{ $learner_details->address }}</div>
              </div>
              <div class="row mt-3">
                <div class="col-lg-3 col-md-4 label">Landmark</div>
                <div class="col-lg-9 col-md-8">{{ $learner_details->landmark ?? 'Not Set' }}</div>
              </div>
              <div class="row mt-3">
                <div class="col-lg-3 col-md-4 label">Email</div>
                <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
              </div>
            </div>

            {{-- Edit Profile --}}
            <div class="tab-pane fade" id="edit-profile">
              <form method="POST" action="{{ route('learner.profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                  <label for="photo_link" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                  <div class="col-md-8 col-lg-9">
                    <div class="d-flex justify-content-center align-items-center">
                      <div class="image-container" onclick="document.getElementById('fileInput').click();">
                        <img id="profileImage" src="{{ $learner_details->photo_link ? $learner_details->photo_link : asset('storage/profile-photos/default-learner.jpg') }}" alt="Profile Photo" class="rounded-circle" style="max-width:150px; cursor:pointer;">
                        <div class="overlay">Click to upload</div>
                      </div>
                      <input type="file" name="photo_link" id="fileInput" class="file-input d-none" accept="image/*" onchange="previewImage(event)">
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="name" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text" name="phone" class="form-control" id="phone" value="{{ $learner_details->phone }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="gender" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                  <div class="col-md-8 col-lg-9">
                    <select name="gender" id="gender" class="form-select">
                      <option value="male" {{ $learner_details->gender == 'male' ? 'selected' : '' }}>Male</option>
                      <option value="female" {{ $learner_details->gender == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="dob" class="col-md-4 col-lg-3 col-form-label">Date of Birth</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="date" name="dob" class="form-control" id="dob" value="{{ $learner_details->dob }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="state" class="col-md-4 col-lg-3 col-form-label">State</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text" name="state" class="form-control" id="state" value="{{ $learner_details->state }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="lga" class="col-md-4 col-lg-3 col-form-label">LGA</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text" name="lga" class="form-control" id="lga" value="{{ $learner_details->lga }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text" name="address" class="form-control" id="address" value="{{ $learner_details->address }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="landmark" class="col-md-4 col-lg-3 col-form-label">Landmark</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text" name="landmark" class="form-control" id="landmark" value="{{ $learner_details->landmark }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}" required>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
              </form>
            </div>

            {{-- Change Password --}}
            <div class="tab-pane fade" id="change-password">
              <form method="POST" action="{{ route('learner.password.update') }}">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                  <label for="current_password" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="password" name="current_password" class="form-control" id="current_password" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="password" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="password" name="password" class="form-control" id="password" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="password_confirmation" class="col-md-4 col-lg-3 col-form-label">Confirm New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
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

<style>
.image-container {
  position: relative;
  display: inline-block;
}

.overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: rgba(0, 0, 0, 0.5);
  color: white;
  text-align: center;
  padding: 5px;
  opacity: 0;
  transition: opacity 0.3s;
}

.image-container:hover .overlay {
  opacity: 1;
}
</style>

<script>
function previewImage(event) {
  const reader = new FileReader();
  reader.onload = function() {
    const output = document.getElementById('profileImage');
    output.src = reader.result;
  }
  reader.readAsDataURL(event.target.files[0]);
}
</script>
@endsection 