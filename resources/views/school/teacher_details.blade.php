@extends('school.index')
@section('content')
<div class="card">
  <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mt-4">
          <div>
              <nav>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">Teachers</a></li>
                      <li class="breadcrumb-item active">Teacher Details</li>
                      <li class="breadcrumb-item active">{{ $teacher->name }}</li>
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
            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#settings">Settings</button>
            </li>
          </ul>
          <div class="tab-content pt-2">
            {{-- Overview --}}
            <div class="tab-pane fade show active" id="overview">
              <h5 class="card-title">About</h5>
              <p class="small fst-italic">{{ $teacher->teacherDetail->about }}</p>

              <h5 class="card-title">Teacher Details</h5>
              <div class="row">
                <div class="col-lg-3 col-md-4 label">Full Name</div>
                <div class="col-lg-9 col-md-8">{{ $teacher->name }}</div>
              </div>
              <div class="row mt-3">
                <div class="col-lg-3 col-md-4 label">Phone</div>
                <div class="col-lg-9 col-md-8">{{ $teacher->teacherDetail->phone }}</div>
              </div>
              <div class="row mt-3">
                <div class="col-lg-3 col-md-4 label">Gender</div>
                <div class="col-lg-9 col-md-8">{{ ucfirst($teacher->teacherDetail->gender) }}</div>
              </div>
              <div class="row mt-3">
                <div class="col-lg-3 col-md-4 label">State</div>
                <div class="col-lg-9 col-md-8">{{ $teacher->teacherDetail->state }}</div>
              </div>
              <div class="row mt-3">
                <div class="col-lg-3 col-md-4 label">LGA</div>
                <div class="col-lg-9 col-md-8">{{ $teacher->teacherDetail->lga }}</div>
              </div>
              <div class="row mt-3">
                <div class="col-lg-3 col-md-4 label">Address</div>
                <div class="col-lg-9 col-md-8">{{ $teacher->teacherDetail->address }}</div>
              </div>
              <div class="row mt-3">
                <div class="col-lg-3 col-md-4 label ">Email</div>
                <div class="col-lg-9 col-md-8">{{ $teacher->email }}</div>
              </div>
              <div class="row mt-3">
                <div class="col-lg-3 col-md-4 label ">Status</div>
                <div class="col-lg-9 col-md-8">
                  {{ $teacher->suspended ? 'Suspended' : 'Active' }}
                </div>
              </div>
            </div>

            {{-- Edit Profile --}}
            <div class="tab-pane fade" id="edit-profile">
              <form method="POST" action="{{ route('school.teacher.update', $teacher->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                  <label for="photo_link" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                  <div class="col-md-8 col-lg-9">
                    <div class="d-flex justify-content-center align-items-center">
                      <div class="image-container" onclick="document.getElementById('fileInput').click();">
                        <img id="profileImage" src="{{ $teacher->teacherDetail->photo_link ? asset($teacher->teacherDetail->photo_link) : asset('storage/profile-photos/default-teacher.jpg') }}" alt="Profile Photo" style="max-width:150px; cursor:pointer;">
                        <div class="overlay">Click to upload</div>
                      </div>
                      <input type="file" name="photo_link" id="fileInput" class="file-input d-none" accept="image/*" onchange="previewImage(event)">
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="name" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text" name="name" class="form-control" id="name" value="{{ $teacher->name }}" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text" name="phone" class="form-control" id="phone" value="{{ $teacher->teacherDetail->phone }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="gender" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                  <div class="col-md-8 col-lg-9">
                    <select name="gender" id="gender" class="form-select">
                      <option value="male" {{ $teacher->teacherDetail->gender == 'male' ? 'selected' : '' }}>Male</option>
                      <option value="female" {{ $teacher->teacherDetail->gender == 'female' ? 'selected' : '' }}>Female</option>
                      <option value="other" {{ $teacher->teacherDetail->gender == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="state" class="col-md-4 col-lg-3 col-form-label">State</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text" name="state" class="form-control" id="state" value="{{ $teacher->teacherDetail->state }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="lga" class="col-md-4 col-lg-3 col-form-label">LGA</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text" name="lga" class="form-control" id="lga" value="{{ $teacher->teacherDetail->lga }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text" name="address" class="form-control" id="address" value="{{ $teacher->teacherDetail->address }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                  <div class="col-md-8 col-lg-9">
                    <textarea name="about" class="form-control" id="about" rows="4">{{ $teacher->teacherDetail->about }}</textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="email" name="email" class="form-control" id="email" value="{{ $teacher->email }}" required>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
              </form>
            </div>

            {{-- Change Password --}}
            <div class="tab-pane fade" id="change-password">
              <div class="row mb-3">
                <label class="col-md-4 col-lg-3 col-form-label">Reset Password</label>
                <div class="col-md-8 col-lg-9">
                  <form method="POST" action="{{ route('school.teacher.passwordReset', $teacher->id) }}">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-warning">Reset Password</button>
                  </form>
                </div>
              </div>
            </div>

            {{-- Settings --}}
            <div class="tab-pane fade" id="settings">
              <form method="POST" action="{{ route('school.teacher.suspend', $teacher->id) }}">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                  <label for="suspended" class="col-md-4 col-lg-3 col-form-label">
                    Suspend <span>{{ $teacher->name }}</span>
                  </label>
                  <div class="col-md-8 col-lg-9">
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="checkbox"
                        id="suspended"
                        name="suspended"
                        value="1"
                        {{ $teacher->suspended ? 'checked' : '' }}
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
                    >{{ old('reason', $teacher->suspension_reason ?? '') }}</textarea>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-danger">Update Suspension</button>
                </div>
              </form>
            </div>
          </div> {{-- tab content --}}
        </div> {{-- card body --}}
      </div> {{-- card --}}
    </div> {{-- col --}}
  </div> {{-- row --}}
</section>

<script>
  function previewImage(event) {
    const input = event.target;
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById('profileImage').src = e.target.result;
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

<style>
.image-container {
  position: relative;
  display: inline-block;
  cursor: pointer;
}
.image-container .overlay {
  position: absolute;
  bottom: 0;
  background: rgba(0,0,0,0.5);
  color: #fff;
  width: 100%;
  text-align: center;
  opacity: 0;
  transition: opacity 0.3s ease;
  padding: 5px 0;
  font-size: 14px;
}
.image-container:hover .overlay {
  opacity: 1;
}
.file-input {
  display: none;
}
</style>
@endsection
