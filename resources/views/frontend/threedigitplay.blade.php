@extends('user_layouts.master')

@section('style')
<style>
    #output {
      display: flex;
    }
    .output {
        border: 1px solid #ab0000;
        border-radius: 3px;
        background: #ab0000;
        color: #fff;
        padding: 10px;
        margin: 10px 5px 5px 5px;
    }
</style>
@endsection

@section('content')
<!-- remain balance section -->
<div class="fixed-card">
    <div class="row mt-2">
      <div class="col d-flex justify-content-between">
       <div>
         <div class="d-flex">
           <span class="material-icons" style="font-size: 40px;">account_balance_wallet</span>
           <p class="mt-2 px-2">လက်ကျန်ငွေ</p>
         </div>
         <p>0.00 Kyat</p>
       </div>
       <div class="text-center">
        <i class="fa-solid fa-clock mt-1" style="font-size: 28px;"></i><span>ပိတ်ရန်ကျန်ချိန်</span>
        <p>2023-11-16 <br><span>02:30:00PM</span></p>
       </div>
      </div>
    </div>
</div>
<!-- remain balance section -->

<!-- play section -->
<div style="height: 79vh;">
    <div class="form-group mb-3">
        <input type="number" class="form-control" style="height: 50px;" placeholder="ငွေပမာဏ အနည်းဆုံး (၁၀၀)ကျပ်" name="" id="">
    </div>
    <div class="form-group mb-3">
        <input type="number" class="form-control" style="height: 50px;" placeholder="စာရိုက်ပြီး ဂဏန်းရွေးမည်" name="" id="additionalInput">
    </div>
    <h6 class="text-center my-4" style="color: red;">ဂဏန်းရွေးမည်</h6>
    <div class="container">
        <div class="d-flex justify-content-between">
            <input type="number" class="form-control threed-digit" placeholder="ရှေ့"  min="0" max="9">
            <input type="number" class="form-control threed-digit mx-2" placeholder="လယ်"  min="0" max="9">
            <input type="number" class="form-control threed-digit" placeholder="နောက်"  min="0" max="9">
        </div>
        <div class="text-center my-3">
            <a type="button" onclick="chooseNumber()" class="btn threeplay-btn text-white w-100" style="background: #ab0000;">ရွေးမည်</a>
        </div>
        <div class="container">
            <div id="output"></div>
        </div>
    <div class="container mt-5">
        <div class="d-flex justify-content-around">
            <div class="">
                <a type="button" onclick="removeNumber()" class="btn removeplay-btn btn-outline-danger">ဖျက်မည်</a>
            </div>
            <div class="">
                <a href="{{ url('/admin/three-d-play-confirm') }}" class="btn" style="background: #ab0000; color:#fff">ထိုးမည်</a>
             </div>
        </div>
    </div>
</div>
<!-- play section -->
@endsection

@section('script')
<script>
    function chooseNumber() {
      const inputs = document.querySelectorAll('.threed-digit');
      const additionalInput = document.getElementById('additionalInput');
      const output = document.getElementById('output');
      const additionalValue = additionalInput.value;
      const values = Array.from(inputs).map(input => input.value);

          if (additionalValue) {
              const result = document.createElement('div');
              result.classList.add('output');
              result.textContent = `${additionalValue}`;
              output.appendChild(result);
          } else {
              const result = document.createElement('div');
              result.classList.add('output');
              result.textContent = `${values.join('')}`;
              output.appendChild(result);
          }
          inputs.forEach(input => input.value = '');
          additionalInput.value = '';

    }

    function removeNumber() {
          const output = document.getElementById('output');
          while (output.firstChild) {
              output.removeChild(output.firstChild);
          }
      }


</script>
@endsection
