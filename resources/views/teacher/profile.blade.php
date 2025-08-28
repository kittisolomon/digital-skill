@extends('instructor.index')
@section('content')
<div class="card">
  <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mt-4">
          <div>
              <nav>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="">Profile</a></li>
                      <li class="breadcrumb-item active">Profile Details</li>
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
    <div class="col-xl-4">

      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

          @if($instructor_details->photo_link)
            <img src="{{ $instructor_details->photo_link }}" alt="Profile" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
          @else
            <i class="bx bx-user-circle text-muted" style="font-size: 50px;"></i>
          @endif
          <h2>{{ $user->name }}</h2>
          <h3>{{ $instructor_details->qualification }}</h3>
          <div class="social-links mt-2">
            @if($instructor_details->twitter)
            <a href="{{ $instructor_details->twitter }}" class="twitter"><i class="bi bi-twitter"></i></a>
            @endif
           @if($instructor_details->facebook)
           <a href="{{ $instructor_details->facebook }}" class="facebook"><i class="bi bi-facebook"></i></a>
           @endif
            @if($instructor_details->linkedin)
            <a href="{{ $instructor_details->linkedin }}" class="linkedin"><i class="bi bi-linkedin"></i></a>
            @endif
            @if($instructor_details->github)
            <a href="{{ $instructor_details->github }}" class="github"> <i class="bi bi-github"></i></a>
            @endif
          </div>
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

            {{-- <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
            </li> --}}

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
            </li>

          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">
              <h5 class="card-title">About</h5>
              <p class="small fst-italic">{{ $instructor_details->about }}</p>

              <h5 class="card-title">Profile Details</h5>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Full Name</div>
                <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Qualification</div>
                <div class="col-lg-9 col-md-8">{{ $instructor_details->qualification }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Experience</div>
                <div class="col-lg-9 col-md-8">{{ $instructor_details->years_of_experience }} years</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Expertise Areas</div>
                <div class="col-lg-9 col-md-8">{{ $instructor_details->area_of_expertise }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Gender</div>
                <div class="col-lg-9 col-md-8">{{ $instructor_details->gender }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Phone</div>
                <div class="col-lg-9 col-md-8">{{ $instructor_details->phone }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Email</div>
                <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
              </div>

            </div>

            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

              <!-- Profile Edit Form -->
              <form action="{{ route('instructor.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                  <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                  <div class="col-md-8 col-lg-8">
                      <div class="d-flex justify-content-center align-items-center">
                      <div class="image-container" onclick="document.getElementById('fileInput').click();">
                          <img id="profileImage" src="{{ $instructor_details->photo_link }}" alt="Profile Photo">
                          <div class="overlay">Click to upload</div>
                      </div>
                      <input type="file" name="photo_link" id="fileInput" class="file-input" accept="image/*" onchange="previewImage(event)">
                      </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="name" type="text" class="form-control" id="fullName" value="{{ $user->name }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                  <div class="col-md-8 col-lg-9">
                    <textarea name="about" class="form-control" id="about" style="height: 100px">{{ $instructor_details->about }}</textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="qualification" class="col-md-4 col-lg-3 col-form-label">Qualification</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="qualification" type="text" class="form-control" id="qualification" value="{{ $instructor_details->qualification }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="experience" class="col-md-4 col-lg-3 col-form-label">Years of Experience</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="years_of_experience" type="number" class="form-control" id="experience" value="{{ $instructor_details->years_of_experience }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="expertise" class="col-md-4 col-lg-3 col-form-label">Areas of Expertise</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="area_of_expertise" type="text" class="form-control" id="expertise" value="{{ $instructor_details->area_of_expertise }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="gender" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                  <div class="col-md-8 col-lg-9">
                    <select name="gender" class="form-control" id="gender">
                      <option value="male" {{ $instructor_details->gender == 'male' ? 'selected' : '' }}>Male</option>
                      <option value="female" {{ $instructor_details->gender == 'female' ? 'selected' : '' }}>Female</option>
                      <option value="other" {{ $instructor_details->gender == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="phone" type="text" class="form-control" id="Phone" value="{{ $instructor_details->phone }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="email" type="email" class="form-control" id="Email" value="{{ $user->email }}">
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
              </form>
              <!-- End Profile Edit Form -->

            </div>

            {{-- <div class="tab-pane fade pt-3" id="profile-settings">

              <!-- Settings Form -->
              <form>

                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                  <div class="col-md-8 col-lg-9">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="changesMade" checked>
                      <label class="form-check-label" for="changesMade">
                        Changes made to your account
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="newProducts" checked>
                      <label class="form-check-label" for="newProducts">
                        Information on new products and services
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="proOffers">
                      <label class="form-check-label" for="proOffers">
                        Marketing and promo offers
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                      <label class="form-check-label" for="securityNotify">
                        Security alerts
                      </label>
                    </div>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
              </form><!-- End settings Form -->

            </div> --}}

            <div class="tab-pane fade pt-3" id="profile-change-password">
              <!-- Change Password Form -->
              <form method="POST" action="{{ route('instructor.update.password') }}">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                  <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="password" type="password" class="form-control" id="currentPassword">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="newpassword" type="password" class="form-control" id="newPassword">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
              </form>
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