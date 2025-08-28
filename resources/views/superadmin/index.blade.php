<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BSELMS - Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" href="{{ asset('frontend/assets/images/main-imgs/benue-logo.png') }}" type="image/x-icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Toastr CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  
  <!-- Vendor CSS Files -->
  <link href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  {{-- <link href="{{ asset('backend/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet"> --}}
  <!-- DataTables CSS -->
<link href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.1/css/responsive.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.bootstrap5.min.css">

  <!-- Template Main CSS File -->
  <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">

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

@media (min-width: 768px) {
  .dt-paging {
      text-align: right !important;
      float: right !important;
  }
}
#enrolled tbody tr td{
    padding: 15px; 
}

#payments tbody tr td{
    padding: 15px; 
}

#discounts tbody tr td{
    padding: 15px; 
}

#visitlogs tbody tr td{
    padding: 15px; 
}
#studentsTB tbody tr td{
    padding: 15px; 
}
</style>
</head>

<body>

  <!-- ======= Header ======= -->
  @include('layouts.dashheader')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('layouts.admin_navbar')
  <!-- End Sidebar-->

  <main id="main" class="main">

    @yield('content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Benue State E-Learning System</span></strong>.
      <br> All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Powered by <a href="https://bdic.ng" target="_blank"><img src="{{ asset('backend/images/bdic_logo.png')}}"></a>
    </div>
  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
  <script src="https://code.jquery.com/jquery-3.7.1.js"> </script>
  <script src="{{ asset('backend/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/quill/quill.js') }}"></script>
  {{-- <script src="{{ asset('backend/assets/vendor/simple-datatables/simple-datatables.js') }}"></script> --}}
  <!-- jQuery (Required for DataTables) -->
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"> </script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"> </script>

<!-- DataTables Responsive Extension -->
<script src="https://cdn.datatables.net/responsive/3.0.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.1/js/responsive.bootstrap5.min.js"></script>

<!-- DataTables Buttons Extension -->
<script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.colVis.min.js"></script>

<!-- JSZip for Excel Export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<!-- PDFMake for PDF Export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>


<script src="{{ asset('backend/assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('backend/assets/js/main.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script>
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profileImage').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
</script>
  <script>
    $(document).ready(function () {
    $(".discount-btn").on("click", function () {
        let courseId = $(this).data("course-id");
        let courseTitle = $(this).data("course-title");

        $("#modal-course-id").val(courseId);
        $("#modal-course-title").text(courseTitle);
    });
    });
  </script>
  
<script>
  $(document).ready(function () {
      $(".disabled-btn").on("click", function () {
          toastr.error("Discount not applied to this course.");
      });
  });
</script>
<script>
  new DataTable('#enrolled', {
    responsive: true,
    paging: true, 
    searching: true,
    ordering: true,
    info: true,
    pageLength: 10,
    lengthMenu: [5, 10, 25, 50, 100], 
    dom: 'lBfrtip',  // ✅ Added 'l' to show page length dropdown
    buttons: [
        {
            extend: 'excelHtml5',
            text: 'Excel',
            className: 'btn btn-success'
        },
        {
            extend: 'csvHtml5',
            text: 'CSV',
            className: 'btn btn-warning'
        },
        {
            extend: 'pdfHtml5',
            text: 'PDF',
            className: 'btn btn-danger'
        },
        {
            extend: 'print',
            text: 'Print',
            className: 'btn btn-primary'
        }
    ]
});
</script>
<script>
  new DataTable('#payments', {
    responsive: true,
    paging: true, 
    searching: true,
    ordering: true,
    info: true,
    pageLength: 10,
    lengthMenu: [5, 10, 25, 50, 100], 
    dom: 'lBfrtip',  // ✅ Added 'l' to show page length dropdown
    buttons: [
        {
            extend: 'excelHtml5',
            text: 'Excel',
            className: 'btn btn-success'
        },
        {
            extend: 'csvHtml5',
            text: 'CSV',
            className: 'btn btn-warning'
        },
        {
            extend: 'pdfHtml5',
            text: 'PDF',
            className: 'btn btn-danger'
        },
        {
            extend: 'print',
            text: 'Print',
            className: 'btn btn-primary'
        }
    ]
});
</script>
<script>
  new DataTable('#discounts', {
    responsive: true,
    paging: true, 
    searching: true,
    ordering: true,
    info: true,
    pageLength: 10,
    lengthMenu: [5, 10, 25, 50, 100], 
    dom: 'lBfrtip',  // ✅ Added 'l' to show page length dropdown
    buttons: [
        {
            extend: 'excelHtml5',
            text: 'Excel',
            className: 'btn btn-success'
        },
        {
            extend: 'csvHtml5',
            text: 'CSV',
            className: 'btn btn-warning'
        },
        {
            extend: 'pdfHtml5',
            text: 'PDF',
            className: 'btn btn-danger'
        },
        {
            extend: 'print',
            text: 'Print',
            className: 'btn btn-primary'
        }
    ]
});
</script>

<script>
  new DataTable('#visitlogs', {
    responsive: true,
    paging: true, 
    searching: true,
    ordering: true,
    info: true,
    pageLength: 10,
    lengthMenu: [5, 10, 25, 50, 100], 
    dom: 'lBfrtip',  // ✅ Added 'l' to show page length dropdown
    buttons: [
        {
            extend: 'excelHtml5',
            text: 'Excel',
            className: 'btn btn-success'
        },
        {
            extend: 'csvHtml5',
            text: 'CSV',
            className: 'btn btn-warning'
        },
        {
            extend: 'pdfHtml5',
            text: 'PDF',
            className: 'btn btn-danger'
        },
        {
            extend: 'print',
            text: 'Print',
            className: 'btn btn-primary'
        }
    ]
});
</script>

{{-- students table --}}
<script>
    new DataTable('#studentsTB', {
      responsive: true,
      paging: true, 
      searching: true,
      ordering: true,
      info: true,
      pageLength: 10,
      lengthMenu: [5, 10, 25, 50, 100], 
      dom: 'lBfrtip',  
      buttons: [
          {
              extend: 'excelHtml5',
              text: 'Excel',
              className: 'btn btn-success'
          },
          {
              extend: 'csvHtml5',
              text: 'CSV',
              className: 'btn btn-warning'
          },
          {
              extend: 'pdfHtml5',
              text: 'PDF',
              className: 'btn btn-danger'
          },
          {
              extend: 'print',
              text: 'Print',
              className: 'btn btn-primary'
          }
      ]
  });
  </script>

{{-- instructors table --}}
<script>
    new DataTable('#instructorsTable', {
      responsive: true,
      paging: true, 
      searching: true,
      ordering: true,
      info: true,
      pageLength: 10,
      lengthMenu: [5, 10, 25, 50, 100], 
      dom: 'lBfrtip',  
      buttons: [
          {
              extend: 'excelHtml5',
              text: 'Excel',
              className: 'btn btn-success'
          },
          {
              extend: 'csvHtml5',
              text: 'CSV',
              className: 'btn btn-warning'
          },
          {
              extend: 'pdfHtml5',
              text: 'PDF',
              className: 'btn btn-danger'
          },
          {
              extend: 'print',
              text: 'Print',
              className: 'btn btn-primary'
          }
      ]
  });
  </script>

{{-- schools table --}}
<script>
    new DataTable('#schoolsTable', {
      responsive: true,
      paging: true, 
      searching: true,
      ordering: true,
      info: true,
      pageLength: 10,
      lengthMenu: [5, 10, 25, 50, 100], 
      dom: 'lBfrtip',  
      buttons: [
          {
              extend: 'excelHtml5',
              text: 'Excel',
              className: 'btn btn-success'
          },
          {
              extend: 'csvHtml5',
              text: 'CSV',
              className: 'btn btn-warning'
          },
          {
              extend: 'pdfHtml5',
              text: 'PDF',
              className: 'btn btn-danger'
          },
          {
              extend: 'print',
              text: 'Print',
              className: 'btn btn-primary'
          }
      ]
  });
  </script>

  {{-- backups table --}}
  <script>
     new DataTable('#backupsTable', {
      responsive: true,
      paging: true, 
      searching: true,
      ordering: true,
      info: true,
      pageLength: 10,
      lengthMenu: [5, 10, 25, 50, 100], 
      dom: 'lBfrtip',  
      buttons: [
          {
              extend: 'excelHtml5',
              text: 'Excel',
              className: 'btn btn-success'
          },
          {
              extend: 'csvHtml5',
              text: 'CSV',
              className: 'btn btn-warning'
          },
          {
              extend: 'pdfHtml5',
              text: 'PDF',
              className: 'btn btn-danger'
          },
          {
              extend: 'print',
              text: 'Print',
              className: 'btn btn-primary'
          }
      ]
  });
</script>

</script>

  <script>
   @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch (type) {
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif
</script>

{{-- monthly payments --}}
<script>
    $(document).ready(function () {
      $.ajax({
        url: "{{ route('monthly.payments') }}",
        method: "GET",
        success: function (data) {
          var options = {
            series: [{
              name: 'Total',
              data: data.total
            }, {
              name: 'Fee',
              data: data.fee
            }, {
              name: 'Settlement Amount',
              data: data.settlement
            }],
            chart: {
              type: 'bar',
              height: 350
            },
            plotOptions: {
              bar: {
                horizontal: false,
                columnWidth: '75%',
                endingShape: 'rounded'
              },
            },
            dataLabels: {
              enabled: false
            },
            stroke: {
              show: true,
              width: 2,
              colors: ['transparent']
            },
            xaxis: {
              categories: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
            },
            yaxis: {
              title: {
                text: '₦ (thousands)'
              }
            },
            fill: {
              opacity: 1
            },
            tooltip: {
              y: {
                formatter: function (val) {
                  return "₦ " + val + " thousands"
                }
              }
            }
          };
  
          new ApexCharts(document.querySelector("#monthlyPayments"), options).render();
        }
      });
    });
  </script>

{{-- Top earning instructors --}}
<script>
    $(document).ready(function () {
      $.ajax({
        url: "{{ route('top.earning.instructors') }}",
        method: "GET",
        success: function (data) {
          var options = {
            series: data.series,
            chart: {
              height: 350,
              type: 'pie',
              toolbar: {
                show: true
              }
            },
            labels: data.labels
          };
  
          new ApexCharts(document.querySelector("#topSellers"), options).render();
        }
      });
    });
  </script>
{{-- Top selling courses --}}
<script>
    $(document).ready(function () {
      $.ajax({
        url: "{{ route('top.selling.courses') }}",
        method: "GET",
        success: function (data) {
          var options = {
            series: data.series,
            chart: {
              height: 350,
              type: 'donut',
              toolbar: {
                show: true
              }
            },
            labels: data.labels
          };
  
          new ApexCharts(document.querySelector("#topSellingCourse"), options).render();
        }
      });
    });
  </script>

{{-- report chart --}}
<script>
  $(document).ready(function () {
    $.ajax({
      url: "{{ route('admin.monthlyReports') }}",
      method: 'GET',
      dataType: 'json',
      success: function (data) {
        console.log("Chart data:", data); // Debug log

        let chart = new ApexCharts(document.querySelector("#reportsChart"), {
          series: [
            { name: 'Course', data: data.courses },  // Only Course data
            { name: 'Student', data: data.students }  // Only Student data
          ],
          chart: {
            height: 350,
            type: 'area',
            toolbar: { show: false },
          },
          markers: { size: 4 },
          colors: ['#4154f1', '#ff771d'],  // Course in blue, Student in orange
          fill: {
            type: "gradient",
            gradient: {
              shadeIntensity: 1,
              opacityFrom: 0.3,
              opacityTo: 0.4,
              stops: [0, 90, 100]
            }
          },
          dataLabels: { enabled: false },
          stroke: { curve: 'smooth', width: 2 },
          xaxis: {
            type: 'category',
            categories: data.months
          },
          tooltip: {
            x: { format: 'MMM' },
            y: {
              formatter: function (val) {
                return val; // Displays the raw value on tooltip
              }
            }
          }
        });

        chart.render();
      },
      error: function (xhr, status, error) {
        console.error('Error loading monthly report:', error);
      }
    });
  });
</script>
{{-- top visit platforms --}}
<script>
  $(document).ready(function () {
    $.ajax({
      url: "{{ route('admin.getTopVisitPlatforms') }}",  // The route you created above
      method: 'GET',
      dataType: 'json',
      success: function (data) {
        console.log("Chart data:", data);  // For debugging

        // Initialize the ECharts instance
        var chart = echarts.init(document.querySelector("#trafficChart"));

        // Set the chart options with the data
        chart.setOption({
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
            data: data.data  
          }]
        });
      },
      error: function (xhr, status, error) {
        console.error('Error loading platforms data:', error);
      }
    });
  });
</script>
{{-- edit category --}}
<script>
  $(document).ready(function () {
    $('.edit-category-btn').on('click', function () {
      const categoryId = $(this).data('id');
      const categoryName = $(this).data('name');

      $('#editCategoryId').val(categoryId);
      $('#editCategoryName').val(categoryName);
    });
  });
</script>
{{-- Toggle Category Featured --}}
<script>
  $(document).ready(function() {
    $('.toggle-featured').on('change', function() {
      const categoryId = $(this).data('id');

      $.ajax({
        url: "{{ route('category.toggleFeatured') }}",
        method: 'POST',
        data: {
          _token: '{{ csrf_token() }}',
          id: categoryId
        }
      })
      .done(function(response) {
        if (response.status) {
          if (response.alert_type === 'success') {
            toastr.success(response.message);
          } else {
            toastr.error(response.message);
          }
        } else {
          toastr.warning('Toggle status not changed.');
        }
      })
      .fail(function(jqXHR) {
        const message = jqXHR.responseJSON?.message || 'Something went wrong!';
        toastr.error(message);
      });
    });
  });
</script>
  
</body>

</html>