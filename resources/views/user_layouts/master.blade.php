<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('user_app/assets/css/style.css') }}">

    <!-- material icon -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/material-icons@1.13.11/iconfont/material-icons.min.css"
    />

    <!-- Bootstrap CSS 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Diamond 2D | 3D</title>
  </head>
  @yield('style')
  <body>
      <!-- navbar section -->
      <div class="container-fluid fixed-top">
        <div class="row">
          <div class="col-lg-4 col-md-4 offset-lg-4 offset-md-4 bg-green">
            <div class="px-3 py-3">
              <div class="d-flex justify-content-between">
                <div>

                    <a href="{{ url('/') }}" class="text-decoration-none btn btn-sm text-white {{ request()->path() == "/twod" ? "d-none" : "" }}"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h5 class="mx-auto">Diamond 2D | 3D</h5>
                <span class="material-icons" id="refresh">refresh</span>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- navbar section -->

    <div class="container-fluid mt-5 pt-3 pb-5 mb-5">
        @yield('profile')

      <div class="row">
        <div class="col-lg-4 col-md-4 offset-lg-4 offset-md-4">
            @yield('content')
          <footer class="row">
            <div class="col-lg-4 col-md-4 offset-lg-4 offset-md-4 bg-light pt-4 pb-3">
              <div class="d-flex justify-content-around">
                <div class="text-center">
                  <a href="{{ url('/') }}" class="text-decoration-none footer-nav">
                    <i class="fas fa-house-chimney d-block text-secondary footer-icon"></i>
                    <span class="d-block footer-text">ပင်မ</span>
                  </a>
                </div>
                <div class="text-center">
                  <a href="{{ route('user.GetWallet') }}" class="text-decoration-none footer-nav">
                    <i class="fas fa-wallet d-block text-secondary footer-icon"></i>
                    <span class="d-block footer-text">ပိုက်ဆံအိတ်</span>
                  </a>
                </div>
                <div class="text-center">
                  <a href="{{ url('/promo') }}" class="text-decoration-none footer-nav">
                    <i class="fas fa-gift d-block text-secondary footer-icon"></i>
                    <span class="d-block footer-text">ပရိုမိုရှင်း</span>
                  </a>
                </div>
                <div class="text-center">
                  <a href="{{ url('/service') }}" class="text-decoration-none footer-nav">
                    <i class="fas fa-phone d-block text-secondary footer-icon"></i>
                    <span class="d-block footer-text">ဝန်ဆောင်မှုဖုန်း</span>
                  </a>
                </div>
                <div class="text-center">
                  <a href="{{ url('/user/dashboard') }}" class="text-decoration-none footer-nav">
                    <i class="fas fa-user d-block text-secondary footer-icon"></i>
                    <span class="d-block footer-text">ကျွန်ုပ်</span>
                  </a>
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script src="https://kit.fontawesome.com/b829c5162c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

    @yield('script')
  </body>
</html>
