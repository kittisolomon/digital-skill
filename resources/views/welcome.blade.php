<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>One Student, One Teacher, One Digital Skill - Benue State</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- Main CSS -->
  <style>
    :root {
      --primary: #0d6efd;
      --secondary: #6c757d;
      --success: #198754;
      --warning: #ffc107;
      --danger: #dc3545;
      --light: #f8f9fa;
      --dark: #212529;
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      color: #333;
    }
    
    .navbar {
      padding: 15px 0;
      transition: all 0.3s ease;
    }
    
    .navbar-brand img {
      height: 50px;
    }
    
    .nav-link {
      font-weight: 500;
      margin: 0 10px;
    }
    
    .btn-primary {
      background-color: var(--primary);
      border-color: var(--primary);
    }
    
    .btn-primary:hover {
      background-color: #0b5ed7;
      border-color: #0a58ca;
    }
    
    .hero-section {
      background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://placehold.co/1200x800/003366/FFFFFF/png?text=Digital+Skills+Initiative') center/cover no-repeat;
      color: white;
      padding: 120px 0 80px;
    }
    
    .stat-box {
      background: rgba(255, 255, 255, 0.1);
      border-radius: 10px;
      padding: 20px;
      margin: 10px;
      text-align: center;
      backdrop-filter: blur(5px);
    }
    
    .stat-number {
      font-size: 2.5rem;
      font-weight: 700;
      margin-bottom: 0;
    }
    
    .section-title {
      position: relative;
      margin-bottom: 40px;
      font-weight: 700;
    }
    
    .section-title:after {
      content: '';
      position: absolute;
      bottom: -15px;
      left: 0;
      width: 50px;
      height: 3px;
      background-color: var(--primary);
    }
    
    .center-title:after {
      left: 50%;
      transform: translateX(-50%);
    }
    
    .feature-card {
      border: none;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
      height: 100%;
    }
    
    .feature-card:hover {
      transform: translateY(-10px);
    }
    
    .course-card {
      border: none;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      margin-bottom: 30px;
      transition: transform 0.3s ease;
    }
    
    .course-card:hover {
      transform: translateY(-5px);
    }
    
    .impact-section {
      background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://placehold.co/1200x800/001a33/FFFFFF/png?text=Impact+In+Benue+State') fixed center/cover;
      color: white;
      padding: 80px 0;
    }
    
    .newsletter-form {
      display: flex;
      margin: 20px 0;
    }
    
    .newsletter-form input {
      flex: 1;
      padding: 15px;
      border: 1px solid #ddd;
      border-radius: 5px 0 0 5px;
      outline: none;
    }
    
    .newsletter-form button {
      border-radius: 0 5px 5px 0;
    }
    
    footer {
      background-color: var(--dark);
      color: white;
      padding: 60px 0 30px;
    }
    
    .social-icon {
      width: 40px;
      height: 40px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
      margin: 0 5px;
      transition: all 0.3s ease;
    }
    
    .social-icon:hover {
      background: var(--primary);
      transform: translateY(-3px);
    }
  </style>
</head>
<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="https://placehold.co/200x60/003366/FFFFFF/png?text=Benue+Digital+Skills" alt="Benue State Digital Skills Initiative Logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#courses">Courses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#how-it-works">How It Works</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#impact">Impact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">Contact</a>
          </li>
        </ul>
        
        <!-- Authentication Links -->
        <div class="ms-lg-3 mt-3 mt-lg-0">
          @if (Route::has('login'))
            <nav class="d-flex">
              @auth
                <a
                  href="{{ url('/dashboard') }}"
                  class="btn btn-outline-primary me-2"
                >
                  Dashboard
                </a>
              @else
                <a
                  href="{{ route('login') }}"
                  class="btn btn-outline-primary me-2"
                >
                  Log in
                </a>

                @if (Route::has('register'))
                  <a
                    href="{{ route('register') }}"
                    class="btn btn-primary"
                  >
                    Register
                  </a>
                @endif
              @endauth
            </nav>
          @endif
        </div>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-7">
          <h1 class="display-4 fw-bold mb-4">One Student, One Teacher, One Digital Skill</h1>
          <p class="lead mb-5">Empowering Benue State's education system through digital skills training and technology access for students and teachers.</p>
          <div class="d-flex flex-wrap gap-3">
            <a href="#courses" class="btn btn-success btn-lg">Explore Courses</a>
            <a href="#how-it-works" class="btn btn-outline-light btn-lg">Learn More</a>
          </div>
        </div>
        <div class="col-lg-5 d-none d-lg-block">
          <img src="https://placehold.co/500x400/ffffff/003366/png?text=Students+Learning" alt="Students and teachers learning digital skills together" class="img-fluid">
        </div>
      </div>
      
      <!-- Stats Section -->
      <div class="row mt-5 pt-5">
        <div class="col-md-3 col-6">
          <div class="stat-box">
            <p class="stat-number" data-count="12500">0</p>
            <p>Students Equipped</p>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="stat-box">
            <p class="stat-number" data-count="3500">0</p>
            <p>Teachers Trained</p>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="stat-box">
            <p class="stat-number" data-count="15">0</p>
            <p>Digital Skills</p>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="stat-box">
            <p class="stat-number" data-count="240">0</p>
            <p>Schools Participating</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Featured Courses Section -->
  <section id="courses" class="py-5">
    <div class="container py-5">
      <div class="row text-center mb-5">
        <div class="col-lg-8 mx-auto">
          <h2 class="section-title center-title">Featured Digital Skills Courses</h2>
          <p class="text-muted">Choose from our curated selection of digital skills courses designed for beginners and intermediate learners.</p>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="course-card">
            <img src="https://placehold.co/400x250/003366/FFFFFF/png?text=Basic+Computing" alt="Basic Computing and Digital Literacy Course" class="card-img-top">
            <div class="card-body">
              <span class="badge bg-primary mb-2">Beginner</span>
              <h5 class="card-title">Basic Computing & Digital Literacy</h5>
              <p class="card-text">Learn fundamental computer skills, internet navigation, and essential software applications.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <span class="text-warning">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                  </span>
                  <span class="text-muted ms-1">(4.5)</span>
                </div>
                <a href="#" class="btn btn-sm btn-outline-primary">Enroll Now</a>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-4 mb-4">
          <div class="course-card">
            <img src="https://placehold.co/400x250/003366/FFFFFF/png?text=Graphic+Design" alt="Graphic Design Fundamentals Course" class="card-img-top">
            <div class="card-body">
              <span class="badge bg-success mb-2">Intermediate</span>
              <h5 class="card-title">Graphic Design Fundamentals</h5>
              <p class="card-text">Master the basics of visual design, layout principles, and popular design tools.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <span class="text-warning">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                  </span>
                  <span class="text-muted ms-1">(4.0)</span>
                </div>
                <a href="#" class="btn btn-sm btn-outline-primary">Enroll Now</a>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-4 mb-4">
          <div class="course-card">
            <img src="https://placehold.co/400x250/003366/FFFFFF/png?text=Web+Development" alt="Web Development Basics Course" class="card-img-top">
            <div class="card-body">
              <span class="badge bg-primary mb-2">Beginner</span>
              <h5 class="card-title">Web Development Basics</h5>
              <p class="card-text">Learn to build simple websites using HTML, CSS, and JavaScript from scratch.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <span class="text-warning">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </span>
                  <span class="text-muted ms-1">(4.8)</span>
                </div>
                <a href="#" class="btn btn-sm btn-outline-primary">Enroll Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="text-center mt-4">
        <a href="#" class="btn btn-outline-primary">Browse All Courses <i class="fas fa-arrow-right ms-2"></i></a>
      </div>
    </div>
  </section>

  <!-- How It Works Section -->
  <section id="how-it-works" class="py-5 bg-light">
    <div class="container py-5">
      <div class="row text-center mb-5">
        <div class="col-lg-8 mx-auto">
          <h2 class="section-title center-title">How The Initiative Works</h2>
          <p class="text-muted">Our structured approach ensures effective skill development and knowledge transfer.</p>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-3 col-sm-6 mb-4">
          <div class="feature-card">
            <div class="card-body text-center p-4">
              <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <i class="fas fa-laptop-code text-primary fa-2x"></i>
              </div>
              <h5>Device Distribution</h5>
              <p class="text-muted">Each student receives a digital device with necessary software pre-installed.</p>
            </div>
          </div>
        </div>
        
        <div class="col-md-3 col-sm-6 mb-4">
          <div class="feature-card">
            <div class="card-body text-center p-4">
              <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <i class="fas fa-chalkboard-teacher text-primary fa-2x"></i>
              </div>
              <h5>Teacher Training</h5>
              <p class="text-muted">Teachers receive specialized training to effectively mentor students in digital skills.</p>
            </div>
          </div>
        </div>
        
        <div class="col-md-3 col-sm-6 mb-4">
          <div class="feature-card">
            <div class="card-body text-center p-4">
              <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <i class="fas fa-book-open text-primary fa-2x"></i>
              </div>
              <h5>Structured Learning</h5>
              <p class="text-muted">Students follow a curated curriculum with practical projects and assessments.</p>
            </div>
          </div>
        </div>
        
        <div class="col-md-3 col-sm-6 mb-4">
          <div class="feature-card">
            <div class="card-body text-center p-4">
              <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <i class="fas fa-award text-primary fa-2x"></i>
              </div>
              <h5>Certification</h5>
              <p class="text-muted">Successful participants receive verifiable digital certificates of completion.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="py-5">
    <div class="container py-5">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <h2 class="section-title">About the Initiative</h2>
          <p>The "One Student, One Teacher, One Digital Skill" initiative is a groundbreaking program by the Benue State Government to bridge the digital divide and prepare our youth for the future economy.</p>
          <p>We believe that equipping both students and teachers with relevant digital skills is essential for transforming education and creating opportunities for economic growth in our state.</p>
          <p>Through strategic partnerships with technology companies and educational institutions, we provide access to devices, curated curriculum, and ongoing support to ensure sustainable impact.</p>
          <a href="#" class="btn btn-primary mt-3">Learn More About Us</a>
        </div>
        <div class="col-lg-6">
          <img src="https://placehold.co/600x400/003366/FFFFFF/png?text=Initiative+Overview" alt="About the Digital Skills Initiative" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
  </section>

  <!-- Impact Section -->
  <section id="impact" class="impact-section">
    <div class="container">
      <div class="row text-center mb-5">
        <div class="col-lg-8 mx-auto">
          <h2 class="section-title center-title text-white">Our Impact Across Benue State</h2>
          <p>See how we're making a difference in communities throughout the state</p>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-8 mx-auto">
          <div class="bg-white rounded-3 p-4 shadow">
            <div class="row text-center">
              <div class="col-md-4 mb-3 mb-md-0">
                <h3 class="text-primary fw-bold">23</h3>
                <p class="mb-0">Local Government Areas</p>
              </div>
              <div class="col-md-4 mb-3 mb-md-0">
                <h3 class="text-primary fw-bold">87%</h3>
                <p class="mb-0">Completion Rate</p>
              </div>
              <div class="col-md-4">
                <h3 class="text-primary fw-bold">92%</h3>
                <p class="mb-0">Satisfaction Rate</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row mt-5">
        <div class="col-md-10 mx-auto">
          <div id="impactMap" style="height: 400px; background-color: #eee; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
            <p class="text-center p-4">Interactive map showing program reach across Benue State would be displayed here</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Newsletter Section -->
  <section class="py-5 bg-light">
    <div class="container py-5">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <h2 class="section-title">Stay Updated</h2>
          <p class="text-muted">Subscribe to our newsletter for updates on new courses, program expansions, and digital skills news.</p>
        </div>
        <div class="col-lg-6">
          <form class="newsletter-form">
            <input type="email" class="form-control" placeholder="Enter your email address">
            <button class="btn btn-primary">Subscribe</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 mb-4 mb-lg-0">
          <img src="https://placehold.co/200x60/ffffff/003366/png?text=Benue+Digital+Skills" alt="Benue State Digital Skills Initiative Logo" class="mb-3" height="50">
          <p>Empowering the next generation of digital creators and innovators in Benue State through quality education and access to technology.</p>
          <div class="mt-4">
            <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
          </div>
        </div>
        
        <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
          <h5 class="text-white mb-3">Quick Links</h5>
          <ul class="list-unstyled">
            <li class="mb-2"><a href="#" class="text-decoration-none text-muted">Home</a></li>
            <li class="mb-2"><a href="#courses" class="text-decoration-none text-muted">Courses</a></li>
            <li class="mb-2"><a href="#about" class="text-decoration-none text-muted">About Us</a></li>
            <li class="mb-2"><a href="#impact" class="text-decoration-none text-muted">Impact</a></li>
            <li class="mb-2"><a href="#contact" class="text-decoration-none text-muted">Contact</a></li>
          </ul>
        </div>
        
        <div class="col-lg-3 col-md-4 mb-4 mb-md-0">
          <h5 class="text-white mb-3">Contact Info</h5>
          <ul class="list-unstyled text-muted">
            <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> Ministry of Education, Makurdi, Benue State</li>
            <li class="mb-2"><i class="fas fa-phone me-2"></i> +234 XXX XXX XXXX</li>
            <li class="mb-2"><i class="fas fa-envelope me-2"></i> info@benuedigitalskills.ng</li>
          </ul>
        </div>
        
        <div class="col-lg-3 col-md-4">
          <h5 class="text-white mb-3">Partners</h5>
          <div class="d-flex flex-wrap gap-3">
            <img src="https://placehold.co/100x40/ffffff/003366/png?text=Partner+1" alt="Partner logo" height="40">
            <img src="https://placehold.co/100x40/ffffff/003366/png?text=Partner+2" alt="Partner logo" height="40">
            <img src="https://placehold.co/100x40/ffffff/003366/png?text=Partner+3" alt="Partner logo" height="40">
          </div>
        </div>
      </div>
      
      <hr class="my-4 bg-secondary">
      
      <div class="row">
        <div class="col-md-6 text-center text-md-start">
          <p class="text-muted mb-0">&copy; 2023 Benue State Digital Skills Initiative. All rights reserved.</p>
        </div>
        <div class="col-md-6 text-center text-md-end">
          <p class="text-muted mb-0">Designed for the people of Benue State</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Simple counter animation for statistics
    document.addEventListener('DOMContentLoaded', function() {
      const counters = document.querySelectorAll('.stat-number');
      const speed = 200;
      
      counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-count'));
        let count = 0;
        
        const updateCount = () => {
          const increment = Math.ceil(target / speed);
          
          if (count < target) {
            count += increment;
            if (count > target) count = target;
            counter.innerText = count.toLocaleString();
            setTimeout(updateCount, 1);
          } else {
            counter.innerText = target.toLocaleString();
          }
        };
        
        updateCount();
      });
    });
  </script>
</body>
</html>