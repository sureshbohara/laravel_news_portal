<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Tarai Khabar - Admin Login">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Tarai Khabar News,Tarai News Khabar">
    <?php 
    use App\Models\Setting;
     $setting = App\Models\Setting::find(1);
     ?>
    <title>Admin-Taraikhabar</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{$setting->getFirstMediaUrl('fav','full') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{asset('admin/vendors/simplebar/css/simplebar.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/vendors/simplebar.css')}}">
    <!-- Main styles for this application-->
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
    <link href="{{asset('admin/css/examples.css')}}" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>


  <body>
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center" style="background-image: url('{{$setting->getFirstMediaUrl('login_background_image','full') }}');background-repeat: no-repeat;background-attachment: fixed;background-size: cover;">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="card-group d-block d-md-flex row">
              <div class="card col-md-7 p-4 mb-0">
                <div class="card-body">
                 
                  <h1>Login</h1>
                  <p class="text-medium-emphasis">Sign In to your account</p>
                  <form action="{{route('admin.login')}}" method="post" id="loginForm">@csrf

                   <div class="input-group mb-3">
                    <span class="input-group-text">
                      <svg class="icon">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                      </svg>
                    </span>
                    <input class="form-control" name="email" id="email" type="email" placeholder="Email & Username">
                  </div>

                  <div class="input-group mb-4">
                    <span class="input-group-text">
                      <svg class="icon">
                       <i class="fa fa-lock" aria-hidden="true"></i>
                      </svg>
                    </span>
                    <input class="form-control" name="password" id="password" type="password" placeholder="Password">
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <button class="btn btn-primary px-4" type="submit">Login</button>
                    </div>
                    <!-- <div class="col-6 text-end">
                      <button class="btn btn-link px-0" type="button">Forgot password?</button>
                    </div> -->
                  </div>
                </form>

                </div>
              </div>
              <div class="card col-md-5 text-white bg-primary py-5">
                <div class="card-body text-center">
                  <div>
                    <h2>Tarai Khabar</h2>
                    <p>तराई खबर, नेपाल, प्रा.लि. डटकम सबैको हो भन्ने सत्य साबित भइसकेको छ ।
                     तराई खबर, नेपाल, प्रा.लि. डटकमलाई सबैभन्दा राम्रो अनलाइन न्युज पोर्टल बनाउने हाम्रो दृढ सङ्कल्प छ ।
                   </p>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('admin/vendors/@coreui/coreui/js/coreui.bundle.min.js')}}"></script>
    <script src="{{asset('admin/vendors/simplebar/js/simplebar.min.js')}}"></script>
    <script src="https://use.fontawesome.com/c91ba8772f.js"></script>


  </body>
</html>