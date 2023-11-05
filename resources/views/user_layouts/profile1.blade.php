<!-- profile section -->
<div class="row parent-div" style="background: linear-gradient(90deg, rgba(212,0,0,1) 0%, rgba(212,0,0,1) 52%, rgba(255,0,0,1) 100%);">
    <div class="col">
      <div class="d-flex justify-content-between pt-3">
        <div class="d-flex">
          <i class="fa-regular fa-circle-user profile-icon d-block me-3"></i>
          <div class="mt-2 text-white">
            @auth
                <p class="mb-0">{{ Auth::user()->name }}</p>
                <p>{{ Auth::user()->phone }}</p>
                
            @endauth
            @guest
                <a href="{{ route('login') }}" class="text-decoration-none text-white">
                    အကောင့်ဝင်ပါ
                </a>
            @endguest
          </div>
        </div>
        <div class="mt-3">
          <i class="fas fa-bell" style="font-size: 30px; color: white"></i>
        </div>
      </div>
    </div>
    <div class="col-12">
      <div class="card child-div px-3 py-2">
        <div class="d-flex">
          @auth
          <p class="text-danger me-2 pb-0 mb-0">လက်ကျန်ငွေ 
            @if(Auth::user()->balance > 0)
            {{ Auth::user()->balance }}
            (ကျပ်)</p>
          <i class="fas fa-eye d-block mt-1 text-danger" style="font-size: 18px;"></i>
            @else
        <p><span class="text-danger font-weight-bold d-block">0.00 (ကျပ်)</span>
        <i class="fas fa-eye-slash d-block mt-1 text-danger" style="font-size: 18px;"></i>
            </p>
            @endif
          @endauth
        </div>
      </div>
    </div>
</div>
<!-- profile section -->


