<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BSELMS - Instructor Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" href="{{ asset('frontend/assets/images/main-imgs/benue-logo.png') }}" type="image/x-icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

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

  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  @include('layouts.dashheader')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('layouts.instruct_navbar')
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
  <script src="{{ asset('backend/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('backend/assets/js/main.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  
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
// Video Modal Functionality
document.addEventListener('DOMContentLoaded', function() {
    var videoModal = document.getElementById('videoModal');
    if (videoModal) {
        videoModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var videoUrl = button.getAttribute('data-video-url');
            var videoTitle = button.getAttribute('data-video-title');
            
            // Set the video source
            var videoSource = document.getElementById('videoSource');
            var videoPlayer = document.getElementById('videoPlayer');
            var modalTitle = document.getElementById('videoModalLabel');
            
            if (videoSource && videoPlayer && modalTitle) {
                videoSource.src = videoUrl;
                videoPlayer.load();
                modalTitle.textContent = videoTitle;
            }
        });

        // Stop video when modal is closed
        videoModal.addEventListener('hidden.bs.modal', function () {
            var video = document.getElementById('videoPlayer');
            if (video) {
                video.pause();
                video.currentTime = 0;
            }
        });
    }
});
</script>

<style>
    .btn-group .btn.active {
        background-color: #0d6efd;
        color: white;
        border-color: #0d6efd;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var pdfModal = document.getElementById('pdfModal');
        if (pdfModal) {
            pdfModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var pdfUrl = button.getAttribute('data-pdf-url');
                var iframe = pdfModal.querySelector('#pdf-frame');
                var loadingDiv = pdfModal.querySelector('#pdf-loading');
                var errorDiv = pdfModal.querySelector('#pdf-error');
                var downloadLink = pdfModal.querySelector('#pdf-download-link');
                
                // Show loading state
                loadingDiv.style.display = 'block';
                errorDiv.style.display = 'none';
                iframe.style.display = 'none';
                
                // Set download link
                if (downloadLink) {
                    downloadLink.href = pdfUrl;
                }
                
                // Handle Cloudinary URLs - add parameters for better PDF handling
                if (pdfUrl && pdfUrl.includes('cloudinary')) {
                    // Add parameters for better PDF display
                    if (!pdfUrl.includes('?')) {
                        pdfUrl += '?fl_attachment=true&fl_sanitize=true';
                    } else {
                        pdfUrl += '&fl_attachment=true&fl_sanitize=true';
                    }
                }
                
                // Set iframe source
                iframe.setAttribute('src', pdfUrl);
                
                // Handle iframe load events
                iframe.onload = function() {
                    loadingDiv.style.display = 'none';
                    iframe.style.display = 'block';
                };
                
                iframe.onerror = function() {
                    loadingDiv.style.display = 'none';
                    errorDiv.style.display = 'block';
                };
                
                // Fallback: hide loading after 10 seconds if iframe doesn't load
                setTimeout(function() {
                    if (loadingDiv.style.display !== 'none') {
                        loadingDiv.style.display = 'none';
                        errorDiv.style.display = 'block';
                    }
                }, 10000);
            });

            pdfModal.addEventListener('hidden.bs.modal', function () {
                var iframe = pdfModal.querySelector('#pdf-frame');
                var loadingDiv = pdfModal.querySelector('#pdf-loading');
                var errorDiv = pdfModal.querySelector('#pdf-error');
                
                iframe.setAttribute('src', '');
                iframe.style.display = 'none';
                loadingDiv.style.display = 'none';
                errorDiv.style.display = 'none';
            });
        }
    });
</script>

</body>

</html>