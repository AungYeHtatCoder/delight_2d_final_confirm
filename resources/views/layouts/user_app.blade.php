@include('layouts.user_head')
  <body>  
    <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4 mx-auto" style="position: relative;">            
            @include('layouts.user_site_title')
            @include('layouts.user_information') 
            @include('layouts.user_banner')
            {{-- add here other page --}}
            @yield('content') 
            <!-- <div class="row">
              <div class="col fixed-bottom" >
                <div class="bg-primary">Fixed bottom</div>
              </div>
              
            </div> -->
            

          {{-- @include('layouts.user_footer') --}}

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
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    @yield('scripts')
  </body>
</html>
