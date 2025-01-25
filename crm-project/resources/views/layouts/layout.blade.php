<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LFI</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Add your JS files here -->
  
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand title-text" href="#"><img src="../images/logo-icon.png" alt="" class="img-fluid logo" ></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span>
                    <div class="line-bar"></div>
                    <div class="line-bar"></div>
                    <div class="line-bar"></div>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              @auth
              <ul class="navbar-nav ms-auto me-5">
                  <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ url('/profile') }}">Profile</a></li>

                    <li class="nav-item"><a class="nav-link" href="{{ url('/customers') }}">Customers</a></li>
                    <form action="{{url('logout')}}" method="post">
                      @csrf
                      <button type="submit" class="Login-btn border-none text-white">Logout</button>
                    </form>
                </ul> 
              @else
                <ul class="navbar-nav ms-auto me-5">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    <li class="nav-item mt-1"><a class="nav-link btn Login-btn" href="{{ route('login') }}">Login</a></li>
                </ul> 
              @endauth
            </div>
        </div>
    </nav>
      @yield('content')
      <section class="footer mt-5">
        <footer>
            <div class="container-fluid">
                <div class="row mt-5">
                    
                    <div class="col-md-4">
                        <section class="about container">
                            <h4 class=" footer-title">About</h4>
                            <p class=" description text-white">"Law for Indians" is a comprehensive online platform dedicated to providing accurate, up-to-date legal information and resources for Indian citizens. Our mission is to educate and empower individuals by simplifying complex legal matters, helping them understand their rights and responsibilities under Indian law.</p>
                        </section>
                    </div>
                    <div class="col-md-4">
                        <section class="quick-links container">
                            <h4 class=" footer-title">Userfull Links</h4>
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-center">
                              <li class="nav-item ">
                                <a class="text-white" href="#">Home</a>
                              </li>
                              <li class="nav-item ">
                                <a class="text-white" href="#">About</a>
                              </li>
                              <li class="nav-item">
                                <a class=" text-white" href="#">Contact</a>
                              </li>
                              <li class="nav-item">
                                <a class=" text-white" href="#">Login</a>
                              </li>
                             </ul> 
                        </section>
                        
                    </div>
                    <div class="col-md-4">
                        <section class="social-media container">
                            <h4 class=" footer-title">Social NetWorks</h4>
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-center">
                              <li class="nav-item">
                                <i class="fab fa-linkedin text-white"></i>
                                <a class="text-white" href="#">Linked In</a>
                              </li>
                              <li class="nav-item">
                                <i class="fab fa-facebook-f text-white"></i>
                                <a class="text-white" href="#">Face Book</a>
                              </li>
                              <li class="nav-item">
                                <i class="fab fa-instagram text-white"></i>
                                <a class=" text-white" href="#">Instagram</a>
                              </li>
                              <li class="nav-item">
                                <i class="fab fa-twitter text-white">
                                <a class=" text-white" href="#"></i>Twitter</a>
                              </li>
                             </ul> 
                        </section>
                    </div>
                </div>
            </div>
           
        </footer>
      </section>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/filter.js') }}"></script>

</body>
</html>
