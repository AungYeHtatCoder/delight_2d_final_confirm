@extends('user_layouts.master')

@section('content')
<h6 class="text-center fw-bold p-3" style="color: #1aacac;">ငွေထုတ်မည်</h6>
<div class="col">
 <p style="color: #1aacac;">ငွေထုတ်မည့်ဘဏ်အကောင့်သတ်မှတ်ပါ</p>
 <div class="d-flex justify-content-between">
  <div class="banks blur-image">
   <img src="{{ asset('user_app/assets/img/bank/kpay.png') }}" onclick="showForm()" class="w-100" alt="">
  </div>
  <div class="banks blur-image">
   <img src="{{ asset('user_app/assets/img/bank/wpay.png') }}" onclick="showForm()" class="w-100" alt="">
  </div>
  <div class="banks blur-image">
   <img src="{{ asset('user_app/assets/img/bank/cbpay.png') }}" onclick="showForm()" class="w-100" alt="">
  </div>
  <div class="banks blur-image">
   <img src="{{ asset('user_app/assets/img/bank/aya_logo.png') }}" onclick="showForm()" class="w-100" alt="">
  </div>
 </div>
</div>
</div>
<div class="row mt-3">
<div class="col-lg-4 mx-auto m-2" id="withdraw-form" style="display: none;">
 <div class="form-group p-2 ms-3">
  <label for="" class="form-label" style="color: #1aacac;">သင့် KBZ Pay အကောင့်</label>
  <input type="text" class="form-control w-100" name="" id="" placeholder="ငွေလက်ခံမည့် သင့်KBZ Pay အကောင့်သတ်မှတ်ပါ">
 </div>
 <div class="form-group p-2 ms-3">
  <label for="" class="form-label" style="color: #1aacac;">ငွေလက်ခံမည့် KBZ Pay ကိုအတည်ပြုရန်</label>
  <input type="text" class="form-control w-100" name="" id="" placeholder="ငွေလက်ခံမည့် သင့်KBZ Pay အကောင့်သတ်မှတ်ပါ">
 </div>
 <div class="p-3 ms-3">
  <button type="button" class="withdraw-btn">အတည်ပြုသည်</button>
 </div>
</div>
</div>
@endsection
