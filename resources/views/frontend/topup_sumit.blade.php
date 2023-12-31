<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Delight project</title>
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('user_app/assets/style.css') }}">
    <!-- material icon -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/material-icons@1.13.11/iconfont/material-icons.min.css"
    />
    <!-- fontawesoome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
        <!-- navbar section -->
   <div class="container-fluid fixed-top">
        <div class="row">
          <div class="col-lg-4 col-md-4 offset-lg-4 offset-md-4 bg-green">            
            <div class="px-3 py-3">
              <div class="d-flex justify-content-between">
                <div></div>
                <a href="top_up.html" style="color: white;"><span class="material-icons">arrow_back</span></a>
                <h5 class="mx-auto">Diamond 2D | 3D</h5> 
                <span class="material-icons" id="refresh">refresh</span>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- navbar section -->

<div class="container-fluid mt-5 pt-3">
     <div class="row mb-5 pb-5 pt-2" >
        <div class="col-lg-4 col-md-4 offset-lg-4 offset-md-4">
            <p class="text-center mt-3" style="color: #1aacac;">ငွေတင်မည်</p>
            <p class="text-center" style="color: #1aacac;">ကျေးဇူးပြု၍ အောက်ပါ Wave Pay အကောင့်သို့ ငွေလွှဲပါ။</p>
            <form>
            <div class="top-up-card d-flex justify-content-between">
            <div class="banks">
                <img src="assets/img/bank/kpay.png" class="w-100" alt="">                
            </div>
            <p class="mt-4">K Pay</p>
            <hr class="vertical-line" style="border-left: 2px solid #000; height: 10vh;">
            <div class="mt-3 mx-5" style="color: #1aacac;">
               <p>လွှဲငွေပမာဏ</p>
               <p>1,000 ကျပ်</p>
            </div>
        </div>
        <p class="mt-4" style="color: #1aacac;font-size: 14px;">လုပ်ဆောင်မှုအမှတ်စဥ် (နောက်ဆုံးဂဏန်း ၆ လုံး)</p>
        <div class="form-group">
            <input type="number" class="form-control" placeholder="ဂဏန်းခြောက်လုံး ဖြည့်ပါ" name="" id="">
        </div>
        <div class="form-group mt-4">
               <a href="" class="submit-btn btn">တင်ပြမည်</a>
        </div>
       </form>
        <p style="color: #1aacac;">ငွေဖြည့်ရန်အဆင်မပြေမှုတစ်စုံတစ်ရာရှိပါက ဆက်သွယ်ရန်</p>
        <div class="service-card mt-4">
            <p class="mt-3">ငွေဖြည့် / ငွေထုတ်</p>
            <div class="phone-icon">
                <i class="fa-brands fa-telegram px-3"></i>
                <i class="fa-brands fa-viber"></i>
            </div>
        </div>
             
        </div>
    </div> 
   
   
</div>


<!-- footer -->
<footer class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-md-4 offset-lg-4 offset-md-4 bg-light pt-4 pb-3">
            <div class="d-flex justify-content-around">
                <div class="text-center">
                    <a href="index.html" class="text-decoration-none footer-nav">
                        <i class="fas fa-house-chimney d-block text-secondary footer-icon"></i>
                        <span class="d-block footer-text">ပင်မ</span>
                    </a>
                </div>
                <div class="text-center">
                    <a href="wallet.html" class="text-decoration-none footer-nav">
                        <i class="fas fa-wallet d-block text-secondary footer-icon"></i>
                        <span class="d-block footer-text">ပိုက်ဆံအိတ်</span>
                    </a>
                </div>
                <div class="text-center">
                    <a href="./promotion.html" class="text-decoration-none footer-nav">
                        <i class="fas fa-gift d-block text-secondary footer-icon"></i>
                        <span class="d-block footer-text">ပရိုမိုရှင်း</span>
                    </a>
                </div>
                <div class="text-center">
                    <a href="service.html" class="text-decoration-none footer-nav">
                        <i class="fas fa-phone d-block text-secondary footer-icon"></i>
                        <span class="d-block footer-text">ဝန်ဆောင်မှုဖုန်း</span>
                    </a>
                </div>
                <div class="text-center">
                    <a href="./dashboard.html" class="text-decoration-none footer-nav">
                        <i class="fas fa-user d-block text-secondary footer-icon"></i>
                        <span class="d-block footer-text">ကျွန်ုပ်</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  </body>
</html>