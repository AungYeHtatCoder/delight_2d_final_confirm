@extends('user_layouts.master')

{{-- @section('profile')
@include('user_layouts.profile3')
@endsection --}}
@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css">
@endsection
@section('content')
<h6 class="text-center mt-2 pb-2" style="color: #1aacac;">ငွေထုတ်မည်</h6>

<p style="color: #1aacac;"> ငွေထုတ်ရန် Logo ပုံကို နိပ်ပါ</p>
<div class="top-up-card">
 <div class="banks blur-image">
  <img src="{{ asset('user_app/assets/img/bank/kpay.png') }}"  onclick="showForm()" class="w-100" alt="">
 </div>
 {{-- <div class="banks blur-image">
  <img src="{{ asset('user_app/assets/img/bank/wpay.png') }}" onclick="showForm()" class="w-100" alt="">
 </div> --}}
 {{-- <div class="banks blur-image">
  <img src="{{ asset('user_app/assets/img/bank/cbpay.png') }}" onclick="showForm()" class="w-100" alt="">
 </div> --}}
 {{-- <div class="banks blur-image">
  <img src="{{ asset('user_app/assets/img/bank/aya_logo.png') }}" onclick="showForm()" class="w-100" alt="">
 </div> --}}
</div>

<div class="text-center mt-3">
<p style="color: #1aacac;">လက်ကျန်ငွေ: {{ Auth::user()->balance }} ကျပ်</p>
</div>
<hr class="my-custom-line">

<div class="row">
<div class="container" id="top-up-form" style="display: none;">
  <form action="{{ route('user.StoreKpayWithdrawMoney') }}" method="POST">
    @csrf
  <div class="form-group">
    <p style="color: #1aacac;">ငွေလက်ခံမည့်ဖုန်းနံပါတ်</p>
    {{-- <input type="number" value="" class="form-control" name="" id="inputField"> --}}
    <input type="number" id="kpay_no" name="kpay_no" class="form-control" value="{{ $user->kpay_no }}">
        {{-- <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" onclick="copyToClipboard()">Copy</button>
        </div> --}}
  </div>
  <div class="form-group">
    <p style="color: #1aacac;">သင်၏ Kpay ဖုန်းနံပါတ်ထဲ့ပါ</p>
    <input type="number" value="" class="form-control" name="user_ph_no" id="inputField">
  </div>
  {{-- <p class="mt-4" style="color: #1aacac;font-size: 14px;">လုပ်ဆောင်မှုအမှတ်စဥ် (နောက်ဆုံးဂဏန်း ၆ လုံး)</p>
        <div class="form-group">
            <input type="number" class="form-control" placeholder="ဂဏန်းခြောက်လုံး ဖြည့်ပါ" name="last_six_digit" id="">
        </div> --}}
  <div class="form-group">
    <p style="color: #1aacac;">ငွေထုတ်ယူမည့်ပမာဏထဲ့ပါ</p>
    <input type="number" value="" class="form-control" name="amount" id="amountInput">
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
    {{-- <a href="{{ route('user.continueUserKpayFillMoney') }}" class="btn top-up-btn" >Continue--</a> --}}
    <button type="submit" class="submit-btn btn">ငွေထုတ်မည်</button>

    </div>
    </form>
  </div>

</div>

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
<script>
   document.addEventListener('DOMContentLoaded', function () {
    @if(session('SuccessRequest'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('SuccessRequest') }}',
            timer: 3000,
            showConfirmButton: false
        });
    @endif
});

</script>
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

    function fillInputBox(element) {
    let clickedValue = element.getAttribute('data-value');
    document.getElementById('amountInput').value = clickedValue;
}

</script>
<script>
    function copyToClipboard() {
        var copyText = document.getElementById("kpay_no");
        copyText.select();
        document.execCommand("copy");
        alert("Copied: " + copyText.value); // Optional: Display an alert to indicate the value has been copied
    }
</script>
@endsection
