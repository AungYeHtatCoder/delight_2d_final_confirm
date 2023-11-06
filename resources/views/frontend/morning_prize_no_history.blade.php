@extends('user_layouts.master')


@section('content')
<!-- content section -->
<div style="padding-bottom: 100px">
 <p class="text-center mt-3 text-green">မှတ်တမ်း</p>
 <div class="d-flex justify-content-between">
  <div class="card py-4 w-100 text-center text-green shadow" id="twod">
   <i class="fas fa-calendar fa-2x mb-3 d-block"></i>
   <span class="d-block">Morning 2D ထီပေါက်စဉ်</span>
  </div>
  <div class="card py-4 w-100 text-center text-green" id="threed">
   <i class="fas fa-calendar fa-2x mb-3 d-block"></i>
   <span class="d-block">Evening 2D ထီပေါက်စဉ်</span>
  </div>
 </div>

 <!-- cards section -->
 <div class="twod">
  @foreach($morningData as $morning)
  <div class="bg-green p-3 rounded my-3">
   <div class="d-flex justify-content-between">
    <div class="text-center">
     <p class="mb-0 pb-0">Session</p>
     <p class="mb-0 pb-0">Morning</p>
    </div>
    <div class="text-center">
     <p class="mb-0 pb-0">Date</p>
     <p class="mb-0 pb-0">
      {{-- date format 16-10-2023 day name and time am  --}}
      {{ date('d-m-Y', strtotime($morning->created_at)) }}
      {{ date('l', strtotime($morning->created_at)) }}
      {{ date('h:i A', strtotime($morning->created_at)) }} 
     
     </p>
    </div>
    <div>
     <p class="mb-0 pb-0">3D</p>
     <p class="text-warning mb-0 pb-0">{{ $morning->prize_no }}</p>
    </div>
   </div>
  </div>
  @endforeach
 </div>

 {{-- <div class="twod">
  <div class="card border border-1 p-3 my-3 text-center twod">

   <p class="btn bg-green shadow rounded-lg text-white">26-10-2023 Thursday</p>
   <div class="d-flex justify-content-around">
    <div>
     <p class="text-green">Set</p>
     <p>1,388.31</p>
    </div>
    <div>
     <p class="text-green">Value</p>
     <p>1,388.31</p>
    </div>
    <div>
     <p class="text-green">2D</p>
     <p>14</p>
    </div>
   </div>
   <hr />

   <div>
    <p class="text-center text-green">12:01 PM</p>
    <div class="d-flex justify-content-around">
     <div>
      <p class="text-green">Set</p>
      <p>1,388.31</p>
     </div>
     <div>
      <p class="text-green">Value</p>
      <p>1,388.31</p>
     </div>
     <div>
      <p class="text-green">2D</p>
      <p>14</p>
     </div>
    </div>
    <hr />
   </div>

   <div>
    <p class="text-center text-green">12:01 PM</p>
    <div class="d-flex justify-content-around">
     <div>
      <p class="text-green">Set</p>
      <p>1,388.31</p>
     </div>
     <div>
      <p class="text-green">Value</p>
      <p>1,388.31</p>
     </div>
     <div>
      <p class="text-green">2D</p>
      <p>14</p>
     </div>
    </div>
    <hr />
   </div>

   <div>
    <p class="text-center text-green">12:01 PM</p>
    <div class="d-flex justify-content-around">
     <div>
      <p class="text-green">Set</p>
      <p>1,388.31</p>
     </div>
     <div>
      <p class="text-green">Value</p>
      <p>1,388.31</p>
     </div>
     <div>
      <p class="text-green">2D</p>
      <p>14</p>
     </div>
    </div>
   </div>
  </div>
  <div class="card border border-1 p-3 my-3 text-center twod">
   <div>
    <p class="btn bg-green shadow rounded-lg text-white">
     26-10-2023 Thursday
    </p>
    <div class="d-flex justify-content-around">
     <div>
      <p class="text-green">Set</p>
      <p>1,388.31</p>
     </div>
     <div>
      <p class="text-green">Value</p>
      <p>1,388.31</p>
     </div>
     <div>
      <p class="text-green">2D</p>
      <p>14</p>
     </div>
    </div>
    <hr />
   </div>

   <div>
    <p class="text-center text-green">12:01 PM</p>
    <div class="d-flex justify-content-around">
     <div>
      <p class="text-green">Set</p>
      <p>1,388.31</p>
     </div>
     <div>
      <p class="text-green">Value</p>
      <p>1,388.31</p>
     </div>
     <div>
      <p class="text-green">2D</p>
      <p>14</p>
     </div>
    </div>
    <hr />
   </div>

   <div>
    <p class="text-center text-green">12:01 PM</p>
    <div class="d-flex justify-content-around">
     <div>
      <p class="text-green">Set</p>
      <p>1,388.31</p>
     </div>
     <div>
      <p class="text-green">Value</p>
      <p>1,388.31</p>
     </div>
     <div>
      <p class="text-green">2D</p>
      <p>14</p>
     </div>
    </div>
    <hr />
   </div>

   <div>
    <p class="text-center text-green">12:01 PM</p>
    <div class="d-flex justify-content-around">
     <div>
      <p class="text-green">Set</p>
      <p>1,388.31</p>
     </div>
     <div>
      <p class="text-green">Value</p>
      <p>1,388.31</p>
     </div>
     <div>
      <p class="text-green">2D</p>
      <p>14</p>
     </div>
    </div>
   </div>
  </div>
  <div class="card border border-1 p-3 my-3 text-center twod">
   <div>
    <p class="btn bg-green shadow rounded-lg text-white">
     26-10-2023 Thursday
    </p>
    <div class="d-flex justify-content-around">
     <div>
      <p class="text-green">Set</p>
      <p>1,388.31</p>
     </div>
     <div>
      <p class="text-green">Value</p>
      <p>1,388.31</p>
     </div>
     <div>
      <p class="text-green">2D</p>
      <p>14</p>
     </div>
    </div>
    <hr />
   </div>

   <div>
    <p class="text-center text-green">12:01 PM</p>
    <div class="d-flex justify-content-around">
     <div>
      <p class="text-green">Set</p>
      <p>1,388.31</p>
     </div>
     <div>
      <p class="text-green">Value</p>
      <p>1,388.31</p>
     </div>
     <div>
      <p class="text-green">2D</p>
      <p>14</p>
     </div>
    </div>
    <hr />
   </div>

   <div>
    <p class="text-center text-green">12:01 PM</p>
    <div class="d-flex justify-content-around">
     <div>
      <p class="text-green">Set</p>
      <p>1,388.31</p>
     </div>
     <div>
      <p class="text-green">Value</p>
      <p>1,388.31</p>
     </div>
     <div>
      <p class="text-green">2D</p>
      <p>14</p>
     </div>
    </div>
    <hr />
   </div>

   <div>
    <p class="text-center text-green">12:01 PM</p>
    <div class="d-flex justify-content-around">
     <div>
      <p class="text-green">Set</p>
      <p>1,388.31</p>
     </div>
     <div>
      <p class="text-green">Value</p>
      <p>1,388.31</p>
     </div>
     <div>
      <p class="text-green">2D</p>
      <p>14</p>
     </div>
    </div>
   </div>
  </div>
  <div class="card border border-1 p-3 my-3 text-center twod">
   <div>
    <p class="btn bg-green shadow rounded-lg text-white">
     26-10-2023 Thursday
    </p>
    <div class="d-flex justify-content-around">
     <div>
      <p class="text-green">Set</p>
      <p>1,388.31</p>
     </div>
     <div>
      <p class="text-green">Value</p>
      <p>1,388.31</p>
     </div>
     <div>
      <p class="text-green">2D</p>
      <p>14</p>
     </div>
    </div>
    <hr />
   </div>

   <div>
    <p class="text-center text-green">12:01 PM</p>
    <div class="d-flex justify-content-around">
     <div>
      <p class="text-green">Set</p>
      <p>1,388.31</p>
     </div>
     <div>
      <p class="text-green">Value</p>
      <p>1,388.31</p>
     </div>
     <div>
      <p class="text-green">2D</p>
      <p>14</p>
     </div>
    </div>
    <hr />
   </div>

   <div>
    <p class="text-center text-green">12:01 PM</p>
    <div class="d-flex justify-content-around">
     <div>
      <p class="text-green">Set</p>
      <p>1,388.31</p>
     </div>
     <div>
      <p class="text-green">Value</p>
      <p>1,388.31</p>
     </div>
     <div>
      <p class="text-green">2D</p>
      <p>14</p>
     </div>
    </div>
    <hr />
   </div>

   <div>
    <p class="text-center text-green">12:01 PM</p>
    <div class="d-flex justify-content-around">
     <div>
      <p class="text-green">Set</p>
      <p>1,388.31</p>
     </div>
     <div>
      <p class="text-green">Value</p>
      <p>1,388.31</p>
     </div>
     <div>
      <p class="text-green">2D</p>
      <p>14</p>
     </div>
    </div>
   </div>
  </div>
 </div> --}}

 <!-- cards section -->

 <!-- card section 2 -->
 <div class="threed d-none">
  @foreach($eveningData as $evening)
  <div class="bg-green p-3 rounded my-3">
   <div class="d-flex justify-content-between">
    <div class="text-center">
     <p class="mb-0 pb-0">Session</p>
     <p class="mb-0 pb-0">Evening</p>
    </div>
    <div class="text-center">
     <p class="mb-0 pb-0">Date</p>
     <p class="mb-0 pb-0">
      {{ date('d-m-Y', strtotime($evening->created_at)) }}
      {{ date('l', strtotime($evening->created_at)) }}
      {{ date('h:i A', strtotime($evening->created_at)) }} 
     
     </p>
    </div>
    <div>
     <p class="mb-0 pb-0">2D</p>
     <p class="text-warning mb-0 pb-0">{{ $evening->prize_no }}</p>
    </div>
   </div>
  </div>
  @endforeach
  {{-- <div class="bg-green p-3 rounded my-3">
   <div class="d-flex justify-content-between">
    <div class="text-center">
     <p class="mb-0 pb-0">Date</p>
     <p class="mb-0 pb-0">16-10-2023</p>
    </div>
    <div>
     <p class="mb-0 pb-0">3D</p>
     <p class="text-warning mb-0 pb-0">445</p>
    </div>
   </div>
  </div>
  <div class="bg-green p-3 rounded my-3">
   <div class="d-flex justify-content-between">
    <div class="text-center">
     <p class="mb-0 pb-0">Date</p>
     <p class="mb-0 pb-0">16-10-2023</p>
    </div>
    <div>
     <p class="mb-0 pb-0">3D</p>
     <p class="text-warning mb-0 pb-0">445</p>
    </div>
   </div>
  </div>
  <div class="bg-green p-3 rounded my-3">
   <div class="d-flex justify-content-between">
    <div class="text-center">
     <p class="mb-0 pb-0">Date</p>
     <p class="mb-0 pb-0">16-10-2023</p>
    </div>
    <div>
     <p class="mb-0 pb-0">3D</p>
     <p class="text-warning mb-0 pb-0">445</p>
    </div>
   </div>
  </div>
  <div class="bg-green p-3 rounded my-3">
   <div class="d-flex justify-content-between">
    <div class="text-center">
     <p class="mb-0 pb-0">Date</p>
     <p class="mb-0 pb-0">16-10-2023</p>
    </div>
    <div>
     <p class="mb-0 pb-0">3D</p>
     <p class="text-warning mb-0 pb-0">445</p>
    </div>
   </div>
  </div>
  <div class="bg-green p-3 rounded my-3">
   <div class="d-flex justify-content-between">
    <div class="text-center">
     <p class="mb-0 pb-0">Date</p>
     <p class="mb-0 pb-0">16-10-2023</p>
    </div>
    <div>
     <p class="mb-0 pb-0">3D</p>
     <p class="text-warning mb-0 pb-0">445</p>
    </div>
   </div>
  </div>
  <div class="bg-green p-3 rounded my-3">
   <div class="d-flex justify-content-between">
    <div class="text-center">
     <p class="mb-0 pb-0">Date</p>
     <p class="mb-0 pb-0">16-10-2023</p>
    </div>
    <div>
     <p class="mb-0 pb-0">3D</p>
     <p class="text-warning mb-0 pb-0">445</p>
    </div>
   </div>
  </div> --}}
 </div>
 <!-- card section 2 -->
</div>

<!-- content section -->
@endsection
@include('user_layouts.footer')

@section('script')
<script>
$('#twod').click(function() {
 $('#twod').addClass('shadow');
 $('#threed').removeClass('shadow');

 $('.twod').removeClass('d-none');
 $('.threed').addClass('d-none');
});
$('#threed').click(function() {
 $('#twod').removeClass('shadow');
 $('#threed').addClass('shadow');

 $('.twod').addClass('d-none');
 $('.threed').removeClass('d-none');
});
</script>
@endsection