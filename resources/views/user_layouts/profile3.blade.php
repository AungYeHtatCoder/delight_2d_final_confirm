    <!-- profile section -->
    <div class="row mb-1">
        <div class="col-lg-4 col-md-4 offset-lg-4 offset-md-4 bg-green border broder-top-1">
            <div class="d-flex py-2">
                <div>
                    <i class="fa-regular fa-circle-user profile-icon"></i>
                </div>
                <div class="ms-3">
                    <p class="mb-0 pb-1">{{ Auth::user()->name }}</p>
                    <p>လက်ကျန်ငွေ {{ Auth::user()->balance }} MMK</p>
                </div>
            </div>
        </div>
    </div>
    <!-- profile section -->
