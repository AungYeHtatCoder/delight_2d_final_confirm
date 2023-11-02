@extends('user_layouts.master')

@section('content')
<div style="height: 100vh;">
    <h6 class="mx-auto p-3 font-weight-bold" style="color: #ab0000;">သင်ငွေလက်ခံမည့်ဘဏ်အကောင့်များ</h6>
    <div class="container">
     <div class="d-flex justify-content-between">
      <div class="banks">
       <img src="{{ asset('user_app/assets/img/bank/kpay.png') }}" class="w-100" alt="">
      </div>
      <div class="banks">
       <img src="{{ asset('user_app/assets/img/bank/wpay.png') }}" class="w-100" alt="">
      </div>
      <div class="banks">
       <img src="{{ asset('user_app/assets/img/bank/cbpay.png') }}" class="w-100" alt="">
      </div>
      <div class="banks">
       <img src="{{ asset('user_app/assets/img/bank/aya_logo.png') }}" class="w-100" alt="">
      </div>
     </div>
</div>
</div>

@endsection
@include('user_layouts.footer')
