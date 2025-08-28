@extends('admin.index')
@section('content')
<div class="card">
  <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mt-4">
          <div>
              {{-- <h3 class="mb-0">Dashboard</h3> --}}
              <nav>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="">Profile</a></li>
                      <li class="breadcrumb-item active">Profile Details</li>
                      <li class="breadcrumb-item active">{{ $student->name }}</li>
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
  <!-- profile  -->
  <section class="section profile">
    <div class="row">
      {{-- <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <h2>{{ $student->name }}</h2>
            <h3>{{ $student->userDetail->job }}</h3>
            <div class="social-links mt-2">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>

      </div> --}}

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
                <h5 class="card-title">About</h5>
                <p class="small fst-italic">{{  $student->userDetail->about}}</p>

                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name</div>
                  <div class="col-lg-9 col-md-8">{{ $student->name }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Company</div>
                  <div class="col-lg-9 col-md-8">{{  $student->userDetail->company }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Job</div>
                  <div class="col-lg-9 col-md-8">{{  $student->userDetail->job}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Country</div>
                  <div class="col-lg-9 col-md-8">{{  $student->userDetail->country}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Address</div>
                  <div class="col-lg-9 col-md-8">{{  $student->userDetail->address}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Phone</div>
                  <div class="col-lg-9 col-md-8">{{  $student->userDetail->phone}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">{{ $student->email }}</div>
                </div>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form method="POST" action="{{ route('student.update', $student->id) }}"  enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                        <div class="col-md-8 col-lg-8">
                          {{-- <img src="{{ asset('backend/assets/img/profile-img.jpg') }}" alt="Profile"> --}}
                        
                            <div class="d-flex justify-content-center align-items-center">
                            <div class="image-container" onclick="document.getElementById('fileInput').click();">
                              <img id="profileImage" src="{{ $student->userDetail->photo_link ? asset($student->userDetail->photo_link) : asset('storage/profile-photos/user-curly-hair.jpg') }}" alt="Profile Photo">
                              <div class="overlay">Click to upload</div>
                            </div>
                            <input type="file" name="photo_link" id="fileInput" class="file-input" accept="image/*" onchange="previewImage(event)">
                            </div>
                        </div>
                      </div>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="name" type="text" class="form-control" id="fullName" value="{{ $student->name}}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                    <div class="col-md-8 col-lg-9">
                      <textarea name="about" class="form-control" id="about" style="height: 100px">{{ $student->userDetail->about }}</textarea>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="company" type="text" class="form-control" id="company" value="{{ $student->userDetail->company }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="job" type="text" class="form-control" id="Job" value="{{ $student->userDetail->job }}">
                    </div>
                </div>
                  <div class="row mb-3">
                    <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="country" type="text" class="form-control" id="Country" value="{{ $student->userDetail->country }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="address" type="text" class="form-control" id="Address" value="{{ $student->userDetail->address }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="phone" type="text" class="form-control" id="Phone" value="{{ $student->userDetail->phone }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control" id="Email" value="{{ $student->email }}">
                    </div>
                  </div>
                
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form>
                <!-- End Profile Edit Form -->

              </div>

              <div class="tab-pane fade pt-3" id="profile-settings">

                   <!-- Settings Form -->
                   <form method="POST" action="{{ route('admin.suspend.user', $student->id) }}">
                    @csrf
                    @method('PUT')
                
                    <div class="row mb-3">
                        <label for="suspended" class="col-md-4 col-lg-3 col-form-label">
                            Suspend <span>{{ $student->name }}</span>
                        </label>
                        <div class="col-md-8 col-lg-9">
                            <div class="form-check">
                                <input 
                                    class="form-check-input" 
                                    type="checkbox" 
                                    id="suspended" 
                                    name="suspended" 
                                    value="1" 
                                    {{ $student->suspended ? 'checked' : '' }}
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
                            >{{ old('reason', $student->suspension_reason) }}</textarea>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
                
                  <!-- End settings Form -->
              </div>

              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
              

                  {{-- <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password" type="password" class="form-control" id="currentPassword">
                    </div>
                  </div> --}}
                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Update Password</label>
                    <div class="col-md-8 col-lg-9">
                        <form method="POST" action="{{ route('user.password.reset', $student->id) }}" onsubmit="return confirm('Reset this user’s password?');">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-warning">Reset Password</button>
                        </form>
                    </div>
                  </div>
 
                <!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>
<!-- End profile -->
@endsection