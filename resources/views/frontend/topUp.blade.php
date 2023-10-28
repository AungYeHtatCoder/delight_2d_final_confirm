@extends('user_layouts.master')

{{-- @section('profile')
@include('user_layouts.profile3')
@endsection --}}

@section('content')
<h6 class="text-center mt-2 pb-2" style="color: #1aacac;">ငွေဖြည့်မည်</h6>

<p style="color: #1aacac;">မိမိ ငွေဖြည့်မည့်ဘဏ်တစ်ခုရွေးပါ</p>
<div class="top-up-card">
 <div class="banks blur-image">
  <img src="{{ asset('user_app/assets/img/bank/kpay.png') }}"  onclick="showForm()" class="w-100" alt="">
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

<div class="text-center mt-3">
<p style="color: #1aacac;">လက်ကျန်ငွေ: 0 ကျပ်</p>
</div>
<hr class="my-custom-line">

<div class="row">
<div class="container" id="top-up-form" style="display: none;">

  <div class="form-group">
    <p style="color: #1aacac;">ငွေဖြည့်ပမာဏ</p>
    <input type="number" value="" class="form-control" name="" id="inputField">
  </div>
    <div class="d-flex justify-content-between m-3">
    <div class="fill-box" data-value="1000" onclick="fillInputBox(this)">
      <p>1,000</p>
    </div>
    <div class="fill-box" data-value="5000" onclick="fillInputBox(this)">
      5,000
    </div>
    <div class="fill-box" data-value="10000" onclick="fillInputBox(this)">
      10,000
    </div>
    </div>
    <div class="d-flex justify-content-between m-3">
    <div class="fill-box" data-value="100000" onclick="fillInputBox(this)">
      100,000
    </div>
    <div class="fill-box" data-value="200000" onclick="fillInputBox(this)">
      200,000
    </div>
    <div class="fill-box" data-value="500000" onclick="fillInputBox(this)">
      500,000
    </div>
    </div>
    <div class="form-group">
    <a href="top-up-submit.html" class="btn top-up-btn" >ဆက်လုပ်ရန်</a>
    </div>
  </div>

</div>

@endsection

@section('script')
<script>
    function showForm() {
      const blurImages = document.querySelectorAll('.blur-image');

      blurImages.forEach((image) => {
        image.addEventListener('click', function () {
          // Remove the 'active' class from all images
          blurImages.forEach((otherImage) => {
            otherImage.classList.remove('active');
          });

          // Add the 'active' class to the clicked image
          this.classList.add('active');
        });
      });
      let form = document.getElementById('top-up-form');
      form.style.display = 'block';
    }
</script>
@endsection