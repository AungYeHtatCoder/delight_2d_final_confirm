<!-- profile section -->
<div class="row bg-green rounded-3 shadow">
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
<!-- profile section -->

