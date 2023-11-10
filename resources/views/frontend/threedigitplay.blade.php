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
        <input type="number" class="form-control" style="height: 50px;" placeholder="At Least Amount (100 MMK)" name="" id="">
    </div>
    <div class="form-group mb-3">
        <input type="number" class="form-control" style="height: 50px;" placeholder="Enter Your Play 3 Digit" name="" id="additionalInput" min="3" max="3">
    </div>
    <h6 class="text-center my-4" style="color: red;">Your Chose Digit</h6>
    <div class="container">
        <div class="text-center my-3">
            <a type="button" onclick="chooseNumber()" class="btn threeplay-btn text-white w-100" style="background: #ab0000;">Choose Digit</a>
        </div>
        <div class="container">
            <div id="output"></div>
        </div>
    <div class="container mt-5">
        <div class="d-flex justify-content-around">
            <div class="">
                <a type="button" onclick="removeNumber()" class="btn removeplay-btn btn-outline-danger">Delete</a>
            </div>
            <div class="">
                <a href="{{ url('/admin/three-d-play-confirm') }}" class="btn" style="background: #ab0000; color:#fff">Continue Play</a>
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
  
  // Retrieve existing digits from localStorage and parse them
  let existingDigits = JSON.parse(localStorage.getItem('chosenDigits')) || [];
  
  const additionalValue = additionalInput.value;
  if (additionalValue) {
    // Push the additional value to the array
    existingDigits.push(additionalValue); 
    const result = document.createElement('div');
    result.classList.add('output');
    result.textContent = additionalValue;
    output.appendChild(result);
  } else {
    // If no additional input, get values from other inputs and merge
    const newDigits = Array.from(inputs).map(input => input.value);
    existingDigits = existingDigits.concat(newDigits);
    const result = document.createElement('div');
    result.classList.add('output');
    result.textContent = newDigits.join('');
    output.appendChild(result);
  }
  
  // Store the merged array of digits in localStorage
  localStorage.setItem('chosenDigits', JSON.stringify(existingDigits));

  // Clear all inputs
  inputs.forEach(input => input.value = '');
  additionalInput.value = '';
}

// function chooseNumber() {
//   const inputs = document.querySelectorAll('.threed-digit');
//   const additionalInput = document.getElementById('additionalInput');
//   const output = document.getElementById('output');
//   let chosenDigits = []; // Array to hold chosen digits

//   const additionalValue = additionalInput.value;
//   if (additionalValue) {
//     chosenDigits.push(additionalValue); // Push the additional value to the array
//     const result = document.createElement('div');
//     result.classList.add('output');
//     result.textContent = additionalValue;
//     output.appendChild(result);
//   } else {
//     // If no additional input, get values from other inputs
//     chosenDigits = Array.from(inputs).map(input => input.value);
//     const result = document.createElement('div');
//     result.classList.add('output');
//     result.textContent = chosenDigits.join('');
//     output.appendChild(result);
//   }
  
//   // Store the chosen digits in localStorage
//   localStorage.setItem('chosenDigits', JSON.stringify(chosenDigits));

//   // Clear all inputs
//   inputs.forEach(input => input.value = '');
//   additionalInput.value = '';
// }

    function removeNumber() {
          const output = document.getElementById('output');
          while (output.firstChild) {
              output.removeChild(output.firstChild);
          }
      }


</script>
@endsection
