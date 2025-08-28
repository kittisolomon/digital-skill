@extends('admin.index')
@section('content')
<div class="card">
  <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mt-4">
          <div>
              {{-- <h3 class="mb-0">Dashboard</h3> --}}
              <nav>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="">Home</a></li>
                      <li class="breadcrumb-item active">Dashboard</li>
                  </ol>
              </nav>
          </div>
          {{-- <a href="{{ url()->previous() }}" class="btn btn-outline-primary">
              <i class="bi bi-arrow-left"></i> Back
          </a> --}}
      </div>
  </div>
</div>
  <!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Sales Card -->
          <div class="col-xl-3 col-md-6">
            <div class="card info-card sales-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  {{-- <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li> --}}
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Users <span>| </span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $countUsers }}</h6>
                    <span class="text-success small pt-1 fw-bold">Total</span> <span class="text-muted small pt-2 ps-1">Users</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-xl-3 col-md-6">
            <div class="card info-card revenue-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
                 {{-- 
                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li> 
                  --}}
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Revenue <span>| </span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-wallet"></i>
                  </div>
                  <div class="ps-3">
                    <h6>₦ {{ number_format($totalRevenue) }}</h6>
                    <span class="text-success small pt-1 fw-bold">Total</span> <span class="text-muted small pt-2 ps-1">Revenue</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- Customers Card -->
          <div class="col-xl-3 col-md-6">

            <div class="card info-card customers-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  {{-- <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li> --}}
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Courses <span>| </span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-mortarboard"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $coursesCount }}</h6>
                    <span class="text-danger small pt-1 fw-bold">Total</span> <span class="text-muted small pt-2 ps-1">Courses</span>

                  </div>
                </div>

              </div>
            </div>

          </div>
          <!-- End Customers Card -->
            <!-- Customers Card -->
            <div class="col-xl-3 col-md-6">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    {{-- <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li> --}}
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Subscribers <span>| </span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-envelope-paper"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $subscribers }}</h6>
                      <span class="text-warning small pt-1 fw-bold">Total</span> <span class="text-muted small pt-2 ps-1">Subscribers</span>

                    </div>
                  </div>

                </div>
              </div>

            </div>
            <!-- End Customers Card -->
      
          <!-- Recent Sales -->
          <div class="col-12">
            <div class="card recent-sales overflow-auto">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  {{-- <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li> --}}
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Recent Sales <span>| Today</span></h5>

                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">S/N</th>
                      <th scope="col">Customer</th>
                      <th scope="col">Product</th>
                      <th scope="col">Price</th>
                      <th scope="col">Status</th>
                      <th scope="col">Date</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($allRecentSales as $index => $sale)
                    <tr>
                      <th scope="row"><a href="#">{{ $index + 1 }}</a></th>
                      <td>{{ $sale->student->name}}</td>
                      <td><a href="#" class="text-primary">{{ $sale->course->title}}</a></td>
                      <td>₦ {{ number_format($sale->course->price) }}</td>
                      <td>
                        @if($sale->status == 0)
                        <span class="badge bg-success">Approved</span>
                        @else
                        <span class="badge bg-danger">Failed</span>
                        @endif
                      </td>
                      <td>{{ $sale->created_at->format('Y/m/d')}} </td>
                      <td>
                          <button class="btn btn-sm bg-danger"><i class="bi bi-trash text-white"></i></button>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>

              </div>

            </div>
          </div><!-- End Recent Sales -->

          <!-- Top Selling -->
          <div class="col-12">
            <div class="card top-selling overflow-auto">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  {{-- <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li> --}}
                </ul>
              </div>

              <div class="card-body pb-0">
                <h5 class="card-title">Top Selling Courses <span>| Today</span></h5>

                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th scope="col">S/N</th>
                      <th scope="col">Preview</th>
                      <th scope="col">Course</th>
                      <th scope="col">Instructor</th>
                      <th scope="col">Price</th>
                      <th scope="col">Sold</th>
                      <th scope="col">Revenue</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($allTopSales as $index => $sale )
                    <tr>
                      <td>{{ $index + 1 }}</td>
                      <th scope="row"><a href="#"><img src="{{ asset($sale->course->photo_link) }}" alt=""></a></th>
                      <td><a href="#" class="text-primary fw-bold">{{ $sale->course->title }}</a></td>
                      <td> {{ "Jon Doe" }} </td>
                      <td>₦  {{ number_format($sale->course->price, 2) }}</td>
                      <td class="fw-bold">{{ $sale->total_sold }}</td>
                      <td>₦ {{ number_format($sale->total_revenue) }}</td>
                    </tr>                    
                    @endforeach
                  </tbody>
                </table>

              </div>

            </div>
          </div>
          <!-- End Top Selling -->
        </div>
      </div>
      <!-- End Left side columns -->

    <div class="row">
      <div class="col-lg-8">
          <!-- Report-->
          <div class="card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Report <span>/Today</span></h5>

              <!-- Line Chart -->
              <div id="reportsChart"></div>

            
              
              <!-- End Line Chart -->

            </div>

          </div>
      </div>

        <!-- Website Traffic -->
        <div class="col-lg-4">
        <div class="card">
          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>

              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div>

          <div class="card-body pb-0">
            <h5 class="card-title">Website Traffic <span>| Today</span></h5>

            <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

          

          </div>
        </div>
      </div>
        <!-- End Website Traffic -->
    </div>
    </div>
  </section>
@endsection