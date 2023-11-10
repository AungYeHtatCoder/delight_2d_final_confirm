@extends('user_layouts.master')

@section('style')
<link rel="stylesheet" href="{{ asset('user_app/assets/balance.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css">
<style>
    .progress-bar-container {
        position: relative;
        background-color: #f3f3f3;
        border-radius: 10px;
        height: 20px;
        width: 100%;
        overflow: hidden;
        margin: 5px 0;
    }

    .progress-bar {
        position: absolute;
        background-color: #4caf50;
        height: 100%;
        transition: width 0.5s;
    }

    .text-center.digit {
        margin: 10px;
        padding: 20px;
        border: 1px solid #dcdcdc;
        border-radius: 10px;
        box-shadow: 2px 2px 10px #dcdcdc;
        transition: background-color 0.3s;
    }

    .text-center.digit:hover {
        background-color: #eaeaea;
    }

    .text-center.digit.disabled {
        cursor: not-allowed;
    }

    /* new  */
    .parallax > use {
animation: move-forever 25s cubic-bezier(.55,.5,.45,.5)     infinite;
}
.parallax > use:nth-child(1) {
animation-delay: -2s;
animation-duration: 7s;
}
.parallax > use:nth-child(2) {
animation-delay: -3s;
animation-duration: 10s;
}
.parallax > use:nth-child(3) {
animation-delay: -4s;
animation-duration: 13s;
}
.parallax > use:nth-child(4) {
animation-delay: -5s;
animation-duration: 20s;
}
.waves-height {
width: 100%;
height: 100px;
}
@keyframes move-forever {
0% {
transform: translate3d(-90px,0,0);
}
100% {
transform: translate3d(85px,0,0);
}
}
.coin-img {
width: 30px;
margin-right: 5px;
}
.bg-darkblue {
background-color: #130a2b;
}
.digit.selected {
background-color: #007bff;
color: white;
background-image: linear-gradient(310deg, #cb0c9f 0%, darkorchid 100%);
border: none;
box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
transition: all 0.3s ease;
margin: 0 4px;
/* Spacing between digits */
}

.digit {
box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
padding: 5px 0;
background: linear-gradient(white, white) padding-box,
linear-gradient(to right, darkblue, darkorchid) border-box;
border-radius: 15px;
border: 3px solid transparent;
font-size: 20px;
font-weight: bold;
transition: all 0.3s ease;
cursor: pointer;
margin: 0 5px;
/* Spacing between digits */
}

.beauty {
font-family: 'Arial', sans-serif;
/* Change as per your preference */
/* background: linear-gradient(45deg, #f3f4f6, #ddd); */
/* Light gradient background */
padding: 0.5em;
}

@keyframes goldAnimate {
0% {
border-color: #ffd700;
}

50% {
border-color: #ffcc00;
}

100% {
border-color: #ffdb58;
}
}

*/
/* General styles */

.digit:hover {
transform: translateY(-5px);
/* Slight lift effect */
box-shadow: 0 6px 2px rgba(0, 0, 0, 0.15);
/* Increased shadow on hover */
}

.disabled {
cursor: not-allowed;
/* Indicates non-clickable */
}

.disabled:hover {
transform: none;
/* No lift effect for disabled */
box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
/* No change in shadow for disabled */
}

.scrollable-container {
max-height: 450px;
/* Adjust the height as needed */
overflow-y: auto;
/* Enable vertical scrolling when content overflows */
}
.account-box {
box-shadow: 0 6px 20px 0 rgb(0 0 0 / 19%);
padding: 10px;
font-size: 14px;
border-radius: 10px;
}
.account-box h5,
.balance-btn .btn {
margin-bottom: 0;
}

@media (max-width: 768px) {
.coin-img {
margin-left: 5px;
}
.waves-height {
height:40px;
min-height:40px;
}
.account-box h5 {
font-size: 14px;
}

}
/* form */
.dream-form {
    background-color: #f8f9fa;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
}
.btn-delete {
    background-color: #e74c3c;
    color: #fff;
}
.btn-confirm {
    background-color: #2ecc71;
    color: #fff;
}

</style>
@endsection

@section('content')
<div class="balance container mb-5">
    <div class="d-flex pt-3 justify-content-between">
        <div class="">
            <div class="d-flex justify-content-between">
                <i class="fas fa-wallet font-green d-block me-2" style="font-size: 20px;"></i>
                {{-- <img src="{{ asset('user_app/assets/img/balance/money.png') }}" alt="money" --}}
                    {{-- style="width: 25px; height: 25px;"> --}}
                {{-- <span class="font-green">လက်ကျန်ငွေ</span> --}}
                <span class="font-green d-block" id="userBalance"
                    data-balance="{{ Auth::user()->balance }}">လက်ကျန်ငွေ - {{ Auth::user()->balance }}
                    MMK
                </span>
            </div>
            <span class="font-green font-13">0.00 (ကျပ်)</span>
        </div>
        <div class="">
            <div class="d-flex">
                <i class="fa-regular fa-clock d-block font-green me-2" style="font-size: 20px;"></i>
                {{-- <img src="{{ asset('user_app/assets/img/balance/time.png') }}" alt="" style="width: 25px; height: 25px;"> --}}
                    <span class="font-green">ပိတ်ရန်ကျန်ချိန်</span>
            </div>
            <span class="font-green font-13">11:53:00 AM</span>
        </div>
    </div>
    <div class="d-flex justify-content-between time-box mt-3">
        <div class="col-3">
            <span>12:01 PM</span>
        </div>
        <div class="col-3">
            <span>အမြန်ရွေး</span>
        </div>
        <div class="col-3">
            <a href="{{ route('admin.GetTwoDigit')}}" style="text-decoration: none"><span style="color: #f8f9fa">Back</span></a>
        </div>
    </div>
    <div class="container-fluid my-5">
        <p>အရောင်ရှင်းလင်းချက်</p>

        <div class="scrollable-container overflow-scroll mt-6 digit-box">
            <div class="row">
    @foreach ($twoDigits->chunk(3) as $chunk)
    <div class="col-4">
        @foreach ($chunk as $digit)
            @php
                $totalBetAmountForTwoDigit = DB::table('lottery_two_digit_copy')
                    ->where('two_digit_id', $digit->id)
                    ->sum('sub_amount');
            @endphp

            @if ($totalBetAmountForTwoDigit < 5000)
                <div class="text-center digit digit-button" style="background-color: javascript:getRandomColor();"
                    data-digit="{{ $digit->two_digit }}" onclick="selectDigit('{{ $digit->two_digit }}', this)">
                    {{ $digit->two_digit }}
                    <small class="d-block" style="font-size: 10px">{{ $remainingAmounts[$digit->id] }}</small>
                </div>
            @else
                <div class="col-2 text-center digit disabled" style="background-color: javascript:getRandomColor();"
                    data-digit="{{ $digit->two_digit }}" onclick="showLimitFullAlert()">
                    {{ $digit->two_digit }}
                </div>
            @endif
        @endforeach
    </div>
    @endforeach
</div>
    
        </div>
       
    </div>
    <div class="dream-form">
        <div class="card mt-3">
            <div class="card-body">
                <div class="row mt-3">
            <div class="col-6">
                <button class="btn btn-success w-100" id="odd">မမ - Odd</button>
            </div>
            <div class="col-6">
                <button class="btn btn-success w-100" id="even">စုံစုံ - Even</button>
            </div>
        </div>
            </div>
        </div>

    @if ($lottery_matches->is_active == 1)
        <form action="{{ route('admin.Quickstore') }}" method="post" class="p-4">
    @csrf
    <!-- Selected Digits Input -->
    <input type="text" id="outputField" name="selected_digits" class="form-control" placeholder="Selected digits" readonly>

    <!-- Amounts Inputs will be appended here -->
    <div id="amountInputs" class="col-md-12 mb-3"></div>

    <!-- Total Amount Input -->
    <div class="col-md-12 mb-3">
        <label for="totalAmount">Total Amount</label>
        <input type="text" id="totalAmount" name="totalAmount" class="form-control" readonly>
    </div>

    <!-- User ID Hidden Input -->
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

    <!-- Submit Buttons -->
    <div class="col-12 d-flex justify-content-center mt-3">
        <button type="submit" class="btn btn-delete mr-3">Cancel</button>
        <button type="submit" class="btn btn-confirm">Submit</button>
    </div>
</form>

    @else
        <div class="text-center p-4">
            <h3>Sorry, you can't play now. Please wait for the next round.</h3>
        </div>
    @endif
    </div>
</div>

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
<script>
    document.getElementById('odd').addEventListener('click', function() {
    const oddDigits = Array.from(document.querySelectorAll('.digit-button'))
        .filter(button => parseInt(button.getAttribute('data-digit')) % 2 !== 0)
        .map(button => button.getAttribute('data-digit'));

    // Assuming 'outputField' is where the selected digits will be displayed
    const outputField = document.getElementById('outputField');
    outputField.value = oddDigits.join(', ');

    // Now create amount input fields for these digits
    const amountInputsDiv = document.getElementById('amountInputs');
    amountInputsDiv.innerHTML = ''; // Clear previous inputs

    oddDigits.forEach(digit => {
const amountInput = document.createElement('input');
        amountInput.type = 'number';
        amountInput.name = `amounts[${digit}]`; // Ensure this follows your naming scheme
        amountInput.id = `amount_${digit}`;
        amountInput.placeholder = `Amount for ${digit}`;
        amountInput.classList.add('form-control', 'mt-2');
        amountInput.onchange = updateTotalAmount; // Bind the change event to your total amount function

        // Append the new input to your amountInputs div
        amountInputsDiv.appendChild(amountInput);
    });

    // Call the updateTotalAmount function to initialize the values
    updateTotalAmount();
});

document.getElementById('even').addEventListener('click', function() {
    // Filter even numbers and also ensure that each digit is even
    const evenDigits = Array.from(document.querySelectorAll('.digit-button'))
    .map(button => button.getAttribute('data-digit').padStart(2, '0')) // Ensure two digits
    .filter(digit => digit[0] % 2 === 0 && digit[1] % 2 === 0) // Filter numbers where both digits are even
    .sort((a, b) => a.localeCompare(b, undefined, {numeric: true})); // Sort numerically


    // Assuming 'outputField' is where the selected digits will be displayed
    const outputField = document.getElementById('outputField');
    outputField.value = evenDigits.join(', ');

    // Now create amount input fields for these digits
    const amountInputsDiv = document.getElementById('amountInputs');
    amountInputsDiv.innerHTML = ''; // Clear previous inputs

    evenDigits.forEach(digit => {
        const amountInput = document.createElement('input');
        amountInput.type = 'number';
        amountInput.name = `amounts[${digit}]`; // Ensure this follows your naming scheme
        amountInput.id = `amount_${digit}`;
        amountInput.placeholder = `Amount for ${digit}`;
        amountInput.classList.add('form-control', 'mt-2');
        amountInput.min = '100'; // Assuming 100 is the minimum amount
        amountInput.max = '5000'; // Assuming 5000 is the maximum amount
        amountInput.required = true;
        amountInput.onchange = updateTotalAmount; // Bind the change event to your total amount function

        // Append the new input to your amountInputs div
        amountInputsDiv.appendChild(amountInput);
    });

    // Call the updateTotalAmount function to initialize the values
    updateTotalAmount();
});

function updateTotalAmount() {
    // Your logic to update the total amount
}

function updateTotalAmount() {
    let total = 0;
    const inputs = document.querySelectorAll('input[name^="amounts["]'); // Get all amount inputs
    inputs.forEach(input => {
        total += Number(input.value) || 0; // Sum all input values, defaulting to 0 if not a number
    });

    // Check against the user's balance
    const userBalanceSpan = document.getElementById('userBalance');
    let userBalance = Number(userBalanceSpan.getAttribute('data-balance'));
    if (userBalance < total) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
             text: 'Your balance is not enough to play two digit. - သင်၏လက်ကျန်ငွေ မလုံလောက်ပါ - ကျေးဇူးပြု၍ ငွေဖြည့်ပါ။',
                     footer: `<a href=
         "{{ route('admin.profiles.index') }}" style="background-color: #007BFF; color: #FFFFFF; padding: 5px 10px; border-radius: 5px; text-decoration: none;">Fill Balance - ငွေဖြည့်သွင်းရန် နိုပ်ပါ </a>`
        });
        return; // Prevent further execution if balance is insufficient
    }

    // Update the user's balance display
    userBalance -= total;
    userBalanceSpan.textContent = `လက်ကျန်ငွေ - ${userBalance.toFixed(2)} MMK`; // Format for display
    userBalanceSpan.setAttribute('data-balance', userBalance);

    // Update the total amount display
    document.getElementById('totalAmount').value = total.toFixed(2);
}

</script>
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
         function showLimitFullAlert() {
             Swal.fire({
                 icon: 'info',
                 title: 'Limit Reached',
                 text: 'This two digit\'s amount limit is full.'
             });
         }

         
     </script>
     <script>
         function getRandomColor() {
             const letters = '0123456789ABCDEF';
             let color = '#';
             for (let i = 0; i < 6; i++) {
                 color += letters[Math.floor(Math.random() * 16)];
             }
             return color;
         }

         document.querySelectorAll('.digit.disabled').forEach(el => {
             el.style.backgroundColor = getRandomColor();
         });
     </script>
@endsection
