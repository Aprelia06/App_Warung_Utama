<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-asset-path="{{ asset('asset') }}" data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Utama Canteen - Register</title>
    <meta name="description" content="" />
    <link rel="shortcut icon" type="image/png" href="assets/img/icon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/css/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/css/pages/page-auth.css') }}" />
    <script src="{{ asset('asset/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('asset/js/config.js') }}"></script>
  </head>

  <body>
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <div class="card">
            <div class="card-body">
              <div class="app-brand justify-content-center">
                <a href="/" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                    <svg width="25" viewBox="0 0 25 42" xmlns="http://www.w3.org/2000/svg">
                      
              <!-- SVG logo here -->
                  <span style="display: flex; justify-content: center; align-items: center; padding: 10px;">
                    <img 
                      src="{{ asset('asset/img/favicon/logos.png') }}" 
                      style="width: 280px; max-width: 230%; height: auto; object-fit: contain;" 
                      alt="SMKI Logo" 
                    />
                  </span>
                </a>
              </div>

              <h4 class="mb-2">Start by creating your account!</h4><br>
              {{-- <p class="mb-4">Make your app management easy and fun!</p> --}}

              <!-- Registration Form -->
              <form method="POST" action="{{ route('register') }}" id="formAuthentication" class="mb-3">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus />
                </div>

                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required />
                </div>

                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge">
                    <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>

                {{-- <div class="mb-3">
                  <label for="role" class="form-label">Register as</label>
                  <select id="role" name="role" class="form-control" required>
                    <option value="pelanggan">Pelanggan</option>
                    <option value="toko">Toko</option>
                    <option value="admin">Admin</option>
                  </select>
                </div> --}}
                

                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password_confirmation">Confirm Password</label>
                  <div class="input-group input-group-merge">
                    <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>

                {{-- <div class="mb-3 form-check">
                  <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                  <label class="form-check-label" for="terms-conditions">
                    I agree to <a href="javascript:void(0);">privacy policy & terms</a>
                  </label>
                </div> --}}

                <button type="submit" class="btn btn-primary d-grid w-100">Sign up</button>
              </form>

              <p class="text-center">
                <span>Already have an account?</span>
                <a href="{{ route('login') }}"><span>Sign in instead</span></a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="{{ asset('asset/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('asset/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('asset/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('asset/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('asset/js/main.js') }}"></script>
  </body>
</html>
