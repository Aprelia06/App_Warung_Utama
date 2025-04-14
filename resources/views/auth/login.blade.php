<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('asset') }}"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Utama Canteen - Login</title>

    <meta name="description" content="Login page for Laravel application" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/img/icon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('asset/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('asset/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/css/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('asset/vendor/css/pages/page-auth.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('asset/vendor/js/helpers.js') }}"></script>

    <!-- Config -->
    <script src="{{ asset('asset/js/config.js') }}"></script>
  </head>

  <body>
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Login Card -->
          <div class="card">
            <div class="card-body">

              <!-- SVG logo here -->
                  <span style="display: flex; justify-content: center; align-items: center; padding: 10px;">
                    <img 
                      src="{{ asset('asset/img/favicon/logos.png') }}" 
                      style="width: 280px; max-width: 230%; height: auto; object-fit: contain;" 
                      alt="SMKI Logo" 
                    />
                  </span>

              <h4 class="mb-2">Welcome Back! 👋</h4>
              <p class="mb-4">Please sign in to your account to continue.</p>

              <!-- Login Form -->
              <form id="formAuthentication" method="POST" action="{{ route('login') }}">
                @csrf

            <!-- Email -->
<div class="mb-3">
  <label for="email" class="form-label">Email</label>
  <input
    type="email"
    class="form-control @error('email') is-invalid @enderror"
    id="email"
    name="email"
    placeholder="Enter your email"
    value="{{ old('email') }}"
    required
    autofocus
  />
  @error('email')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>

<!-- Password -->
<div class="mb-3 form-password-toggle">
  <div class="d-flex justify-content-between">
    <label class="form-label" for="password">Password</label>
    @if (Route::has('password.request'))
      <a href="{{ route('password.request') }}">
        <small>Forgot Password?</small>
      </a>
    @endif
  </div>
  <div class="input-group input-group-merge">
    <input
      type="password"
      id="password"
      class="form-control @error('password') is-invalid @enderror"
      name="password"
      placeholder="••••••••"
      required
    />
    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
    @error('password')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
</div>

<!-- General Error -->
@if (session('error'))
<div class="alert alert-danger">
  {{ session('error') }}
</div>
@endif


                <!-- Remember Me -->
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember_me" name="remember" />
                    <label class="form-check-label" for="remember_me"> Remember Me </label>
                  </div>
                </div>

                <!-- Submit Button -->
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Log In</button>
                </div>
              </form>
              <!-- /Login Form -->

              <p class="text-center">
                <span>New to our platform?</span>
                <a href="{{ route('register') }}">
                  <span>Create an account</span>
                </a>
              </p>
            </div>
          </div>
          <!-- /Login Card -->
        </div>
      </div>
    </div>

    <!-- Core JS -->
    <script src="{{ asset('asset/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('asset/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('asset/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('asset/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('asset/js/main.js') }}"></script>
  </body>
</html>