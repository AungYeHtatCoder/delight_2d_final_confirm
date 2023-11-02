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
    <style>
        .image-container {
          position: relative;
          max-height: 500px;
        }

        .image {
          max-width: 100%;
          height: auto;
        }

        .marquee {
          position: absolute;
          width: 100%;
          height: 30px;
          left: 0;
          bottom: 0;
          background-color: rgba(255, 255, 255, 0.7); /* Background color with transparency */
          overflow: hidden;
        }

        .marquee-text {
          white-space: nowrap;
          animation: marquee-scroll 10s linear infinite;
        }

        @keyframes marquee-scroll {
          0% {
            transform: translateX(100%);
          }
          100% {
            transform: translateX(-100%);
          }
        }
    </style>
  </head>
  @yield('style')
  <body>
    <div class="container-fluid" style="margin-top:60px;">
        <div class="row">
          <div class="col-lg-4 col-md-4 offset-lg-4 offset-md-4 pt-2" id="main-body">
            <!-- navbar section -->
              <div class="container-fluid fixed-top" >
                  <div class="row">
                    <div class="col-lg-4 col-md-4 offset-lg-4 offset-md-4 bg-green shadow" id="top-nav">
                      <div class="px-3 py-3">
                        <div class="d-flex justify-content-between">
                          <div></div>
                            <h5 class="mx-auto">
                                <a href="{{ url('/') }}" class="text-decoration-none text-white">Delight 2D | 3D</a>
                            </h5>
                          <span class="material-icons" id="refresh">refresh</span>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            <!-- navbar section -->

            @yield('profile')
            @yield('content')

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
