@extends('admin.index')
@section('content')
<div class="card">
  <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mt-4">
          <div>
              {{-- <h3 class="mb-0">Dashboard</h3> --}}
              <nav>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('instructor.courses') }}">Monitization</a></li>
                      <li class="breadcrumb-item active">Earning Report</li>
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
                    <h5 class="card-title mb-0">Earning Report</h5>
                    <p class="mb-0">View all Earning Report here.</p>
                </div>
                {{-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategory">
                    <i class="bi bi-plus-lg"></i> Add Category
                </button> --}}
            </div>
            {{--  --}}
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Monthly Payment Trends</h5>
    
                  <!-- Column Chart -->
                  <div id="monthlyPayments"></div>
    
                 
                  <!-- End Column Chart -->
    
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Top 5 Earning Instructors</h5>
          
                    <!-- Pie Chart -->
                    <div id="topSellers"></div>
                    <!-- End Pie Chart -->
          
                  </div>
                </div>
              </div>
          
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Top 5 Selling Courses</h5>
          
                    <!-- Donut Chart -->
                    <div id="topSellingCourse"></div>
                    <!-- End Donut Chart -->
          
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection