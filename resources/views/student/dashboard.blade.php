@extends('learner.index')
@section('content')
<div class="card shadow-sm border-0">
  <div class="card-body p-4">
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-center text-center text-md-start">
          <div class="mb-4 mb-md-0">
              <h3 class="fw-bold" style="color:#012970;">Welcome, {{ explode(' ', $user->name)[0] }} 🎉</h3>
              <p class="mb-4 text-muted text-justify" style="text-align: justify; max-width: 80%;">
                Your personalized learning dashboard. 
                Keep progressing, you're a rockstar! 
              </p>

              <a href="{{ route('learner.enrolled') }}" class="btn btn-sm py-2 text-success px-3 fw-bold" style="background-color: #e0f8e9;"> 
               Proceed To Learning 
              </a>
          </div>
 
          <div class="pe-md-5">  <!-- Added margin and text alignment -->
              <img src="{{ asset('backend/images/man-with-laptop.png') }}" alt="Learning Dashboard" 
                   class="img-fluid" style="max-width: 250px;">  <!-- Increased max-width -->
          </div>
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
          <div class="col-xl-4 col-md-6">
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
                <h5 class="card-title">My Learning <span>| </span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-mortarboard"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $countSubjects }}</h6>
                    <span class="text-success small pt-1 fw-bold">Total</span> <span class="text-muted small pt-2 ps-1">Subjects</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-xl-4 col-md-6">
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
                <h5 class="card-title">Hours Spent <span>| </span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-clock-history"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $timeSpent }}</h6>
                    <span class="text-success small pt-1 fw-bold">Total</span> <span class="text-muted small pt-2 ps-1">Learning Time</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- Customers Card -->
          <div class="col-xl-4 col-md-6">

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
                <h5 class="card-title">Completed <span>| </span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-trophy"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $completedSubjects }}</h6>
                    <span class="text-danger small pt-1 fw-bold">Total</span> <span class="text-muted small pt-2 ps-1">Completed Course</span>

                  </div>
                </div>

              </div>
            </div>

          </div>
          <!-- End Customers Card -->
            <!-- Customers Card -->
            {{-- <div class="col-xl-3 col-md-6">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li> --}}

                    {{-- <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li> --}}
                  {{-- </ul>
                </div> --}}

                {{-- <div class="card-body">
                  <h5 class="card-title">Subscribers <span>| </span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-envelope-paper"></i>
                    </div>
                    <div class="ps-3">
                      <h6>1244</h6>
                      <span class="text-warning small pt-1 fw-bold">Total</span> <span class="text-muted small pt-2 ps-1">Subscribers</span>

                    </div>
                  </div>

                </div> --}}
              {{-- </div> --}}

            {{-- </div> --}}
            <!-- End Customers Card -->
      
          <!-- Recent Enrollments -->
          <!-- <div class="col-12">
            <div class="card recent-sales overflow-auto">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Recent Enrollments <span>| Latest</span></h5>

                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">S/N</th>
                      <th scope="col">Subject</th>
                      <th scope="col">Teacher</th>
                      <th scope="col">Status</th>
                      <th scope="col">Enrollment Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($recentEnrollments as $index => $enrollment)
                    <tr>
                      <th scope="row">{{ $index + 1 }}</th>
                      <td><a href="#" class="text-primary">{{ $enrollment->subject->name }}</a></td>
                      <td>{{ $enrollment->subject->teacher->name ?? 'N/A' }}</td>
                      <td>
                        @if($enrollment->status == 'active')
                        <span class="badge bg-success">Active</span>
                        @else
                        <span class="badge bg-warning">Inactive</span>
                        @endif
                      </td>
                      <td>{{ $enrollment->created_at->format('Y/m/d') }}</td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="5" class="text-center">No recent enrollments found.</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div> -->
          <!-- End Recent Enrollments -->
        </div>
      </div>
      <!-- End Left side columns -->

    {{-- <div class="row">
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
              <h5 class="card-title">Reports <span>/Today</span></h5>

              <!-- Line Chart -->
              <div id="reportsChart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new ApexCharts(document.querySelector("#reportsChart"), {
                    series: [{
                      name: 'Sales',
                      data: [31, 40, 28, 51, 42, 82, 56],
                    }, {
                      name: 'Revenue',
                      data: [11, 32, 45, 32, 34, 52, 41]
                    }, {
                      name: 'Customers',
                      data: [15, 11, 32, 18, 9, 24, 11]
                    }],
                    chart: {
                      height: 350,
                      type: 'area',
                      toolbar: {
                        show: false
                      },
                    },
                    markers: {
                      size: 4
                    },
                    colors: ['#4154f1', '#2eca6a', '#ff771d'],
                    fill: {
                      type: "gradient",
                      gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.3,
                        opacityTo: 0.4,
                        stops: [0, 90, 100]
                      }
                    },
                    dataLabels: {
                      enabled: false
                    },
                    stroke: {
                      curve: 'smooth',
                      width: 2
                    },
                    xaxis: {
                      type: 'datetime',
                      categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                    },
                    tooltip: {
                      x: {
                        format: 'dd/MM/yy HH:mm'
                      },
                    }
                  }).render();
                });
              </script>
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

            <script>
              document.addEventListener("DOMContentLoaded", () => {
                echarts.init(document.querySelector("#trafficChart")).setOption({
                  tooltip: {
                    trigger: 'item'
                  },
                  legend: {
                    top: '5%',
                    left: 'center'
                  },
                  series: [{
                    name: 'Access From',
                    type: 'pie',
                    radius: ['40%', '70%'],
                    avoidLabelOverlap: false,
                    label: {
                      show: false,
                      position: 'center'
                    },
                    emphasis: {
                      label: {
                        show: true,
                        fontSize: '18',
                        fontWeight: 'bold'
                      }
                    },
                    labelLine: {
                      show: false
                    },
                    data: [{
                        value: 1048,
                        name: 'Search Engine'
                      },
                      {
                        value: 735,
                        name: 'Direct'
                      },
                      {
                        value: 580,
                        name: 'Email'
                      },
                      {
                        value: 484,
                        name: 'Union Ads'
                      },
                      {
                        value: 300,
                        name: 'Video Ads'
                      }
                    ]
                  }]
                });
              });
            </script>

          </div>
        </div>
      </div>
        <!-- End Website Traffic -->
    </div> --}}
    </div>
  </section>

  <section class="section dashboard">
    <div class="row">
      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">
          <!-- Recent Enrollments Card -->
          <div class="col-12">
            <div class="card recent-sales overflow-auto">
              <div class="card-body">
                <h5 class="card-title">Recent Subject Enrollments <span>| Latest</span></h5>

                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">S/N</th>
                      <th scope="col">Subject</th>
                      <th scope="col">Teacher</th>
                      <th scope="col">Status</th>
                      <th scope="col">Enrollment Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($recentEnrollments as $index => $enrollment)
                    <tr>
                      <th scope="row">{{ $index + 1 }}</th>
                      <td><a href="#" class="text-primary">{{ $enrollment->subject->title }}</a></td>
                      <td>{{ $enrollment->subject->teacher->name ?? 'N/A' }}</td>
                      <td>
                        @if($enrollment->status == 'active')
                        <span class="badge bg-success">Active</span>
                        @else
                        <span class="badge bg-warning">Inactive</span>
                        @endif
                      </td>
                      <td>{{ $enrollment->created_at->format('Y/m/d') }}</td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="5" class="text-center">No recent enrollments found.</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- End Recent Enrollments Card -->
        </div>
      </div>
    </div>
  </section>
@endsection