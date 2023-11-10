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

    /* .progress-bar {
        position: absolute;
        background-color: #4caf50;
        height: 100%;
        transition: width 0.5s;
    } */

    .text-center.digit {
        margin: 0 10px 10px 0;
        padding: 10px;
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
    /* padding: 5px 0; */
    background: linear-gradient(white, white) padding-box,
    linear-gradient(to right, darkblue, darkorchid) border-box;
    border-radius: 15px;
    border: 3px solid transparent;
    font-size: 20px;
    font-weight: bold;
    transition: all 0.3s ease;
    cursor: pointer;
    /* margin: 0 5px; */
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
        width: 100%;
        max-height: 450px;
        overflow-y: scroll;
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
    .main-row{
        display: grid;
        grid-template-columns: auto auto auto auto auto;
        /* grid-gap: 10px; */
    }
    .column{
        height: 100%;
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
            <div class="main-row">
    @foreach ($twoDigits->chunk(3) as $chunk)
    <div class="column">
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
                                        <div class="progress">
                                        @php
                                        $totalAmount = 5000;
                                        $betAmount = $totalBetAmountForTwoDigit; // the amount already bet
                                        $remainAmount = $totalAmount - $betAmount; // the amount remaining that can be bet
                                        $percentage = ($betAmount / $totalAmount) * 100;
                                    @endphp

                                        <div class="progress-bar" style="width: {{ $percentage }}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
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
      <div class="row">
         <div class="col-md-12">
          <div class="card">
         <div class="card-body">
          <button type="button" id="zero" class="btn btn-primary">0</button>
          <button type="button" id="one" class="btn btn-secondary">1</button>
          <button type="button" id="two" class="btn btn-success">2</button>
          <button type="button" id="three" class="btn btn-danger">3</button>
          <button type="button" id="four" class="btn btn-warning">4</button>
          <button type="button" id="five" class="btn btn-info">5</button>
          <button type="button" id="six" class="btn btn-primary">6</button>
          <button type="button" id="seven" class="btn btn-dark">7</button>
          <button type="button" id="eight" class="btn btn-warning">8</button>
          <button type="button" id="nine" class="btn btn-success">9</button>
         </div>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <a href="{{ route('admin.QuickOddMorningPlayTwoDigit') }}" class="btn btn-info btn-sm">မမ</a>
                <a href="{{ route('admin.QuickEvenMorningPlayTwoDigit') }}" class="btn btn-warning btn-sm">စုံစုံ</a>
                 <a href="{{ route('admin.QuickOddSameMorningPlayTwoDigit') }}" class="btn btn-primary btn-sm">မမ အပူး</a>
                <a href="{{ route('admin.QuickEvenSameMorningPlayTwoDigit') }}" class="btn btn-warning btn-sm">စုံစုံ အပူး</a>
            </div>
        </div>
         </div>
        </div>
         <div class="card mt-3">
         <div class="card-header">
             <h5 class="mb-0">အရောင်ရှင်းလင်းချက်</h5>
         </div>
         <div class="card-body">
          <div class="row">
           <div class="col-3">
            <button id="one_amount" class="btn btn-outline-primary">150MMK</button>
           </div>
           <div class="col-3">
            <button id="two_amount" class="btn btn-outline-secondary">200MMK</button>
          </div>
          <div class="col-3">
            <button id="three_amount" class="btn btn-outline-success">250MMK</button>
         </div>
         <div class="col-3">
            <button id="four_amount" class="btn btn-outline-danger">300MMK</button>
         </div>
          </div>
          <div class="row mt-3">
            <div class="col-3">
             <button id="six_amount" class="btn btn-outline-warning">350MMK</button>
            </div>
            <div class="col-3">
             <button id="seven_amount" class="btn btn-outline-info">500MMK</button>
           </div>
           <div class="col-3">
             <button id="eight_amount" class="btn btn-outline-dark">1000MMK</button>
          </div>
          <div class="col-3">
             <button id="nine_amount" class="btn btn-outline-primary">1500MMK</button>
          </div>
           </div>
           <div class="row mt-3">
            <div class="col-3">
             <button id="ten_amount" class="btn btn-outline-secondary">2000MMK</button>
            </div>
            <div class="col-3">
             <button id="eleven_amount" class="btn btn-outline-success">2500MMK</button>
           </div>
           <div class="col-3">
             <button id="twele_amount" class="btn btn-outline-danger">3000MMK</button>
           </div>
           <div class="col-3">
             <button id="theen_amount" class="btn btn-outline-warning">5000MMK</button>
           </div>
        </div>

    @if ($lottery_matches->is_active == 1)
        <form action="{{ route('admin.Quickstore') }}" method="post" class="p-4">
    @csrf
    <!-- Selected Digits Input -->
    <input type="text" id="outputField" name="selected_digits" class="form-control" placeholder="Selected digits">

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
    // zero addEventListener
 document.getElementById('zero').addEventListener('click', function() {
    const digitsStartingWithZero = Array.from(document.querySelectorAll('.digit-button'))
        .filter(button => button.getAttribute('data-digit').startsWith('0'))
        .map(button => button.getAttribute('data-digit'));
    
    // Assuming 'outputField' is where the selected digits will be displayed
    const outputField = document.getElementById('outputField');
    outputField.value = digitsStartingWithZero.join(', ');

    // Now create amount input fields for these digits
    const amountInputsDiv = document.getElementById('amountInputs');
    amountInputsDiv.innerHTML = ''; // Clear previous inputs

    digitsStartingWithZero.forEach(digit => {
        const amountInput = document.createElement('input');
        amountInput.type = 'number';
        amountInput.name = `amounts[${digit}]`; // Ensure this follows your naming scheme
        amountInput.id = `amount_${digit}`;
        amountInput.placeholder = `Amount for ${digit}`;
        amountInput.value = '100';
        amountInput.classList.add('form-control', 'mt-2');
        amountInput.onchange = updateTotalAmount; // Bind the change event to your total amount function

        // Append the new input to your amountInputs div
        amountInputsDiv.appendChild(amountInput);
    });

    // Call the updateTotalAmount function to initialize the values
    updateTotalAmount();
});
// one addEventListener
 document.getElementById('one').addEventListener('click', function() {
    const digitsStartingWithZero = Array.from(document.querySelectorAll('.digit-button'))
        .filter(button => button.getAttribute('data-digit').startsWith('1'))
        .map(button => button.getAttribute('data-digit'));
    
    // Assuming 'outputField' is where the selected digits will be displayed
    const outputField = document.getElementById('outputField');
    outputField.value = digitsStartingWithZero.join(', ');

    // Now create amount input fields for these digits
    const amountInputsDiv = document.getElementById('amountInputs');
    amountInputsDiv.innerHTML = ''; // Clear previous inputs

    digitsStartingWithZero.forEach(digit => {
        const amountInput = document.createElement('input');
        amountInput.type = 'number';
        amountInput.name = `amounts[${digit}]`; // Ensure this follows your naming scheme
        amountInput.id = `amount_${digit}`;
        amountInput.placeholder = `Amount for ${digit}`;
        amountInput.value = '100';
        amountInput.classList.add('form-control', 'mt-2');
        amountInput.onchange = updateTotalAmount; // Bind the change event to your total amount function

        // Append the new input to your amountInputs div
        amountInputsDiv.appendChild(amountInput);
    });

    // Call the updateTotalAmount function to initialize the values
    updateTotalAmount();
});
    // two addEventListener
    document.getElementById('two').addEventListener('click', function() {
    const digitsStartingWithZero = Array.from(document.querySelectorAll('.digit-button'))
        .filter(button => button.getAttribute('data-digit').startsWith('2'))
        .map(button => button.getAttribute('data-digit'));
    
    // Assuming 'outputField' is where the selected digits will be displayed
    const outputField = document.getElementById('outputField');
    outputField.value = digitsStartingWithZero.join(', ');

    // Now create amount input fields for these digits
    const amountInputsDiv = document.getElementById('amountInputs');
    amountInputsDiv.innerHTML = ''; // Clear previous inputs

    digitsStartingWithZero.forEach(digit => {
        const amountInput = document.createElement('input');
        amountInput.type = 'number';
        amountInput.name = `amounts[${digit}]`; // Ensure this follows your naming scheme
        amountInput.id = `amount_${digit}`;
        amountInput.placeholder = `Amount for ${digit}`;
        amountInput.value = '100';
        amountInput.classList.add('form-control', 'mt-2');
        amountInput.onchange = updateTotalAmount; // Bind the change event to your total amount function

        // Append the new input to your amountInputs div
        amountInputsDiv.appendChild(amountInput);
    });

    // Call the updateTotalAmount function to initialize the values
    updateTotalAmount();
});

document.getElementById('three').addEventListener('click', function() {
    const digitsStartingWithZero = Array.from(document.querySelectorAll('.digit-button'))
        .filter(button => button.getAttribute('data-digit').startsWith('3'))
        .map(button => button.getAttribute('data-digit'));
    
    // Assuming 'outputField' is where the selected digits will be displayed
    const outputField = document.getElementById('outputField');
    outputField.value = digitsStartingWithZero.join(', ');

    // Now create amount input fields for these digits
    const amountInputsDiv = document.getElementById('amountInputs');
    amountInputsDiv.innerHTML = ''; // Clear previous inputs

    digitsStartingWithZero.forEach(digit => {
        const amountInput = document.createElement('input');
        amountInput.type = 'number';
        amountInput.name = `amounts[${digit}]`; // Ensure this follows your naming scheme
        amountInput.id = `amount_${digit}`;
        amountInput.placeholder = `Amount for ${digit}`;
        amountInput.value = '100';
        amountInput.classList.add('form-control', 'mt-2');
        amountInput.onchange = updateTotalAmount; // Bind the change event to your total amount function

        // Append the new input to your amountInputs div
        amountInputsDiv.appendChild(amountInput);
    });

    // Call the updateTotalAmount function to initialize the values
    updateTotalAmount();
});

document.getElementById('four').addEventListener('click', function() {
    const digitsStartingWithZero = Array.from(document.querySelectorAll('.digit-button'))
        .filter(button => button.getAttribute('data-digit').startsWith('4'))
        .map(button => button.getAttribute('data-digit'));
    
    // Assuming 'outputField' is where the selected digits will be displayed
    const outputField = document.getElementById('outputField');
    outputField.value = digitsStartingWithZero.join(', ');

    // Now create amount input fields for these digits
    const amountInputsDiv = document.getElementById('amountInputs');
    amountInputsDiv.innerHTML = ''; // Clear previous inputs

    digitsStartingWithZero.forEach(digit => {
        const amountInput = document.createElement('input');
        amountInput.type = 'number';
        amountInput.name = `amounts[${digit}]`; // Ensure this follows your naming scheme
        amountInput.id = `amount_${digit}`;
        amountInput.placeholder = `Amount for ${digit}`;
        amountInput.value = '100';
        amountInput.classList.add('form-control', 'mt-2');
        amountInput.onchange = updateTotalAmount; // Bind the change event to your total amount function

        // Append the new input to your amountInputs div
        amountInputsDiv.appendChild(amountInput);
    });

    // Call the updateTotalAmount function to initialize the values
    updateTotalAmount();
});

document.getElementById('five').addEventListener('click', function() {
    const digitsStartingWithZero = Array.from(document.querySelectorAll('.digit-button'))
        .filter(button => button.getAttribute('data-digit').startsWith('5'))
        .map(button => button.getAttribute('data-digit'));
    
    // Assuming 'outputField' is where the selected digits will be displayed
    const outputField = document.getElementById('outputField');
    outputField.value = digitsStartingWithZero.join(', ');

    // Now create amount input fields for these digits
    const amountInputsDiv = document.getElementById('amountInputs');
    amountInputsDiv.innerHTML = ''; // Clear previous inputs

    digitsStartingWithZero.forEach(digit => {
        const amountInput = document.createElement('input');
        amountInput.type = 'number';
        amountInput.name = `amounts[${digit}]`; // Ensure this follows your naming scheme
        amountInput.id = `amount_${digit}`;
        amountInput.placeholder = `Amount for ${digit}`;
        amountInput.value = '100';
        amountInput.classList.add('form-control', 'mt-2');
        amountInput.onchange = updateTotalAmount; // Bind the change event to your total amount function

        // Append the new input to your amountInputs div
        amountInputsDiv.appendChild(amountInput);
    });

    // Call the updateTotalAmount function to initialize the values
    updateTotalAmount();
});

document.getElementById('six').addEventListener('click', function() {
    const digitsStartingWithZero = Array.from(document.querySelectorAll('.digit-button'))
        .filter(button => button.getAttribute('data-digit').startsWith('6'))
        .map(button => button.getAttribute('data-digit'));
    
    // Assuming 'outputField' is where the selected digits will be displayed
    const outputField = document.getElementById('outputField');
    outputField.value = digitsStartingWithZero.join(', ');

    // Now create amount input fields for these digits
    const amountInputsDiv = document.getElementById('amountInputs');
    amountInputsDiv.innerHTML = ''; // Clear previous inputs

    digitsStartingWithZero.forEach(digit => {
        const amountInput = document.createElement('input');
        amountInput.type = 'number';
        amountInput.name = `amounts[${digit}]`; // Ensure this follows your naming scheme
        amountInput.id = `amount_${digit}`;
        amountInput.placeholder = `Amount for ${digit}`;
        amountInput.value = '100';
        amountInput.classList.add('form-control', 'mt-2');
        amountInput.onchange = updateTotalAmount; // Bind the change event to your total amount function

        // Append the new input to your amountInputs div
        amountInputsDiv.appendChild(amountInput);
    });

    // Call the updateTotalAmount function to initialize the values
    updateTotalAmount();
});

document.getElementById('seven').addEventListener('click', function() {
    const digitsStartingWithZero = Array.from(document.querySelectorAll('.digit-button'))
        .filter(button => button.getAttribute('data-digit').startsWith('7'))
        .map(button => button.getAttribute('data-digit'));
    
    // Assuming 'outputField' is where the selected digits will be displayed
    const outputField = document.getElementById('outputField');
    outputField.value = digitsStartingWithZero.join(', ');

    // Now create amount input fields for these digits
    const amountInputsDiv = document.getElementById('amountInputs');
    amountInputsDiv.innerHTML = ''; // Clear previous inputs

    digitsStartingWithZero.forEach(digit => {
        const amountInput = document.createElement('input');
        amountInput.type = 'number';
        amountInput.name = `amounts[${digit}]`; // Ensure this follows your naming scheme
        amountInput.id = `amount_${digit}`;
        amountInput.placeholder = `Amount for ${digit}`;
        amountInput.value = '100';
        amountInput.classList.add('form-control', 'mt-2');
        amountInput.onchange = updateTotalAmount; // Bind the change event to your total amount function

        // Append the new input to your amountInputs div
        amountInputsDiv.appendChild(amountInput);
    });

    // Call the updateTotalAmount function to initialize the values
    updateTotalAmount();
});

document.getElementById('eight').addEventListener('click', function() {
    const digitsStartingWithZero = Array.from(document.querySelectorAll('.digit-button'))
        .filter(button => button.getAttribute('data-digit').startsWith('8'))
        .map(button => button.getAttribute('data-digit'));
    
    // Assuming 'outputField' is where the selected digits will be displayed
    const outputField = document.getElementById('outputField');
    outputField.value = digitsStartingWithZero.join(', ');

    // Now create amount input fields for these digits
    const amountInputsDiv = document.getElementById('amountInputs');
    amountInputsDiv.innerHTML = ''; // Clear previous inputs

    digitsStartingWithZero.forEach(digit => {
        const amountInput = document.createElement('input');
        amountInput.type = 'number';
        amountInput.name = `amounts[${digit}]`; // Ensure this follows your naming scheme
        amountInput.id = `amount_${digit}`;
        amountInput.placeholder = `Amount for ${digit}`;
        amountInput.value = '100';
        amountInput.classList.add('form-control', 'mt-2');
        amountInput.onchange = updateTotalAmount; // Bind the change event to your total amount function

        // Append the new input to your amountInputs div
        amountInputsDiv.appendChild(amountInput);
    });

    // Call the updateTotalAmount function to initialize the values
    updateTotalAmount();
});

document.getElementById('nine').addEventListener('click', function() {
    const digitsStartingWithZero = Array.from(document.querySelectorAll('.digit-button'))
        .filter(button => button.getAttribute('data-digit').startsWith('9'))
        .map(button => button.getAttribute('data-digit'));
    
    // Assuming 'outputField' is where the selected digits will be displayed
    const outputField = document.getElementById('outputField');
    outputField.value = digitsStartingWithZero.join(', ');

    // Now create amount input fields for these digits
    const amountInputsDiv = document.getElementById('amountInputs');
    amountInputsDiv.innerHTML = ''; // Clear previous inputs

    digitsStartingWithZero.forEach(digit => {
        const amountInput = document.createElement('input');
        amountInput.type = 'number';
        amountInput.name = `amounts[${digit}]`; // Ensure this follows your naming scheme
        amountInput.id = `amount_${digit}`;
        amountInput.placeholder = `Amount for ${digit}`;
        amountInput.value = '100';
        amountInput.classList.add('form-control', 'mt-2');
        amountInput.onchange = updateTotalAmount; // Bind the change event to your total amount function

        // Append the new input to your amountInputs div
        amountInputsDiv.appendChild(amountInput);
    });

    // Call the updateTotalAmount function to initialize the values
    updateTotalAmount();
});
function setAmountForAllDigits(amount) {
    const inputs = document.querySelectorAll('input[name^="amounts["]');
    inputs.forEach(input => {
        input.value = amount;
    });
    updateTotalAmount(); // Update the total amount after setting the new amounts
}

// Attach event listeners to all amount buttons
document.getElementById('one_amount').addEventListener('click', function() { setAmountForAllDigits(150); });
document.getElementById('two_amount').addEventListener('click', function() { setAmountForAllDigits(200); });
document.getElementById('three_amount').addEventListener('click', function() { setAmountForAllDigits(250); });
document.getElementById('four_amount').addEventListener('click', function() { setAmountForAllDigits(300); });
// document.getElementById('five_amount').addEventListener('click', function() { setAmountForAllDigits(350); });
document.getElementById('six_amount').addEventListener('click', function() { setAmountForAllDigits(350); });
document.getElementById('seven_amount').addEventListener('click', function() { setAmountForAllDigits(500); });
document.getElementById('eight_amount').addEventListener('click', function() { setAmountForAllDigits(1000); });
document.getElementById('nine_amount').addEventListener('click', function() { setAmountForAllDigits(1500); });
document.getElementById('ten_amount').addEventListener('click', function() { setAmountForAllDigits(2000); });
document.getElementById('eleven_amount').addEventListener('click', function() { setAmountForAllDigits(2500); });
document.getElementById('twele_amount').addEventListener('click', function() { setAmountForAllDigits(3000); });
document.getElementById('theen_amount').addEventListener('click', function() { setAmountForAllDigits(5000); });


function updateTotalAmount() {
    let total = 0;
    const inputs = document.querySelectorAll('input[name^="amounts["]'); // Get all amount inputs
    inputs.forEach(input => {
        const value = Number(input.value);
        if (value < 100 || value > 5000) {
            // If the input value is less than 100 or greater than 5000, show an error and reset the input
            Swal.fire({
                icon: 'error',
                title: 'Invalid amount',
                text: 'The amount for each two-digit number must be between 100 and 5000 MMK.'
            });
            input.value = ''; // Reset the invalid input
        } else {
            total += value; // Add valid input values to the total
        }
    });

    // Check against the user's balance
    const userBalanceSpan = document.getElementById('userBalance');
    let userBalance = Number(userBalanceSpan.getAttribute('data-balance'));

    if (userBalance < total) {
        // If the balance is insufficient, show an error
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Your balance is not enough to play two digit. - သင်၏လက်ကျန်ငွေ မလုံလောက်ပါ - ကျေးဇူးပြု၍ ငွေဖြည့်ပါ။',
            footer: `<a href="{{ url('user/wallet') }}" style="background-color: #007BFF; color: #FFFFFF; padding: 5px 10px; border-radius: 5px; text-decoration: none;">Fill Balance - ငွေဖြည့်သွင်းရန် နိုပ်ပါ </a>`
        });
    } else {
        // If the balance is sufficient, update the display
        userBalanceSpan.textContent = `လက်ကျန်ငွေ - ${(userBalance - total).toFixed(2)} MMK`; // Format for display
        userBalanceSpan.setAttribute('data-balance', userBalance - total);

        // Update the total amount display
        document.getElementById('totalAmount').value = total.toFixed(2);
    }
}

// function updateTotalAmount() {
//     let total = 0;
//     const inputs = document.querySelectorAll('input[name^="amounts["]'); // Get all amount inputs
//     inputs.forEach(input => {
//         total += Number(input.value) || 0; // Sum all input values, defaulting to 0 if not a number
//     });

//     // Check against the user's balance
//     const userBalanceSpan = document.getElementById('userBalance');
//     let userBalance = Number(userBalanceSpan.getAttribute('data-balance'));
//     if (userBalance < total) {
//         Swal.fire({
//             icon: 'error',
//             title: 'Oops...',
//              text: 'Your balance is not enough to play two digit. - သင်၏လက်ကျန်ငွေ မလုံလောက်ပါ - ကျေးဇူးပြု၍ ငွေဖြည့်ပါ။',
//                      footer: `<a href=
//          "{{ route('admin.profiles.index') }}" style="background-color: #007BFF; color: #FFFFFF; padding: 5px 10px; border-radius: 5px; text-decoration: none;">Fill Balance - ငွေဖြည့်သွင်းရန် နိုပ်ပါ </a>`
//         });
//         return; // Prevent further execution if balance is insufficient
//     }

//     // Update the user's balance display
//     userBalance -= total;
//     userBalanceSpan.textContent = `လက်ကျန်ငွေ - ${userBalance.toFixed(2)} MMK`; // Format for display
//     userBalanceSpan.setAttribute('data-balance', userBalance);

//     // Update the total amount display
//     document.getElementById('totalAmount').value = total.toFixed(2);
// }

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

