          <!-- profile section -->
          <div
            class="row parent-div"
            style="
              background: linear-gradient(
                90deg,
                rgba(212, 0, 0, 1) 0%,
                rgba(212, 0, 0, 1) 52%,
                rgba(255, 0, 0, 1) 100%
              );
            "
          >
            <div class="col">
              <div class="d-flex py-2">
                <div>
                  <i class="fa-regular fa-circle-user profile-icon"></i>
                </div>
                <div class="ms-3 text-white">
                    <p class="mb-0">{{ Auth::user()->name }}</p>
                    <p>လက်ကျန်ငွေ: {{ Auth::user()->balance }} ကျပ်</p>
                </div>
              </div>
            </div>
          </div>
          <!-- profile section -->
