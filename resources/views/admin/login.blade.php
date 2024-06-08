<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Nepa Khabar</title>

  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets_news/img/logo/Logo-1.png') }}">
   <!-- General CSS Files -->
   <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('assets/modules/bootstrap-social/bootstrap-social.css')}}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">



</head>

<body>

  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="{{ asset('assets_news/img/logo/Logo-1.png') }}" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-danger">
            <div class="loader-line" id="pro_loader"></div>
              <div class="card-header"><h4>Login</h4></div>

              <div class="card-body">
                <form action="{{route('dashboard')}}" method="POST" id="login_auth" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="text" class="form-control" name="email" tabindex="1" required autofocus placeholder="Email">
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <!-- <a href="auth-forgot-password.html" class="text-small icons">
                          Forgot Password?
                        </a> -->
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required placeholder="Password **">
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                  <div class="form-group">
                    <!-- <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div> -->
                  </div>

                  <div class="form-group">
                    <button type="submit" id="sing_in" class="btn btn-danger btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Linkup Nepal Pvt Ltd
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  
</body>
</html>