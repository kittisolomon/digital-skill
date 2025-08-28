@extends('instructor.index')
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
                <h5 class="card-title">Courses <span>| </span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-mortarboard"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $countCourses }}</h6>
                    <span class="text-success small pt-1 fw-bold">Total</span> <span class="text-muted small pt-2 ps-1">Courses</span>

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
                <h5 class="card-title">Revenue <span>| </span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-wallet"></i>
                  </div>
                  <div class="ps-3">
                    <h6>₦ {{ number_format($revenue, 2) }}</h6>
                    <span class="text-success small pt-1 fw-bold">Total</span> <span class="text-muted small pt-2 ps-1">Revenue</span>

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
                <h5 class="card-title">Enrolled <span>| </span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $enrolledCount }}</h6>
                    <span class="text-danger small pt-1 fw-bold">Total</span> <span class="text-muted small pt-2 ps-1">Enrolled</span>

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
                      <th scope="col">Course</th>
                      <th scope="col">Price</th>
                      <th scope="col">Status</th>
                      <th scope="col">Date</th>
                      {{-- <th scope="col">Actions</th> --}}
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($recentSales as $index => $sale)
                    <tr>
                      <th scope="row">{{ $index + 1 }}</th>
                      <td>{{ $sale->student->name }}</td>
                      <td><a href="#" class="text-primary">{{ $sale->course->title }}</a></td>
                      <td>₦ {{ number_format($sale->course->price, 2) }}</td>

                      <td>
                        @if($sale->status == 0)
                        <span class="badge bg-success">Approved</span>
                        @else
                        <span class="badge bg-danger">Failed</span>
                        @endif
                      </td>
                      <td>{{ $sale->created_at->format('Y/m/d') }}</td>
                      {{-- <td>
                          <button class="btn btn-sm bg-warning"><i class="bi bi-eye-fill text-white"></i></button>
                          <button class="btn btn-sm bg-danger"><i class="bi bi-trash text-white"></i></button>
                      </td> --}}
                    </tr>
                    @endforeach
                    {{-- <tr>
                      <th scope="row"><a href="#">2</a></th>
                      <td>Bridie Kessler</td>
                      <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
                      <td>₦4,100</td>
                      <td><span class="badge bg-warning">Pending</span></td>
                      <td>01/03/2024</td>
                      <td>
                          <button class="btn btn-sm bg-warning"><i class="bi bi-pencil-square text-white"></i></button>
                          <button class="btn btn-sm bg-danger"><i class="bi bi-trash text-white"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row"><a href="#">3</a></th>
                      <td>Ashleigh Langosh</td>
                      <td><a href="#" class="text-primary">At recusandae consectetur</a></td>
                      <td>₦18,000</td>
                      <td><span class="badge bg-success">Approved</span></td>
                      <td>01/03/2024</td>
                      <td>
                          <button class="btn btn-sm bg-warning"><i class="bi bi-pencil-square text-white"></i></button>
                          <button class="btn btn-sm bg-danger"><i class="bi bi-trash text-white"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row"><a href="#">4</a></th>
                      <td>Angus Grady</td>
                      <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td>
                      <td>₦1,900</td>
                      <td><span class="badge bg-danger">Rejected</span></td>
                      <td>01/03/2024</td>
                      <td>
                          <button class="btn btn-sm bg-warning"><i class="bi bi-pencil-square text-white"></i></button>
                          <button class="btn btn-sm bg-danger"><i class="bi bi-trash text-white"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row"><a href="#">5</a></th>
                      <td>Raheem Lehner</td>
                      <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                      <td>₦18,000</td>
                      <td><span class="badge bg-success">Approved</span></td>
                      <td>01/03/2024</td>
                      <td>
                          <button class="btn btn-sm bg-warning"><i class="bi bi-pencil-square text-white"></i></button>
                          <button class="btn btn-sm bg-danger"><i class="bi bi-trash text-white"></i></button>
                      </td>
                    </tr> --}}
                  </tbody>
                </table>

              </div>

            </div>
          </div>
          <!-- End Recent Sales -->

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
                <h5 class="card-title">My Top Selling Courses <span>| Today</span></h5>

                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th scope="col">S/N</th>
                      <th scope="col">Photo</th>
                      <th scope="col">Course</th>
                      <th scope="col">Price</th>
                      <th scope="col">Sold</th>
                      <th scope="col">Revenue</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($topSales as $index => $sale)
                    <tr>
                      <td>{{ $index + 1 }}</td>
                      <th scope="row"><a href="#"><img src="{{ asset($sale->course->photo_link) }}" alt=""></a></th>
                      <td><a href="#" class="text-primary fw-bold">{{ $sale->course->title }}</a></td>
                      <td>₦{{ number_format($sale->course->price, 2) }}</td>
                      <td class="fw-bold">{{ $sale->total_sold }}</td>
                      <td>₦ {{ number_format($sale->total_revenue, 2) }}</td>
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
@endsection