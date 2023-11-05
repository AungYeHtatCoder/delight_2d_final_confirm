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
                            <div class="text-center digit"
                                style="background-color: {{ 'javascript:getRandomColor();' }};"
                                onclick="selectDigit('{{ $digit->two_digit }}', this)">
                                {{ $digit->two_digit }}
                                <small class="d-block"
                                    style="font-size: 10px">{{ $remainingAmounts[$digit->id] }}</small>
                            </div>
                        @else
                            <div class="col-2 text-center digit disabled"
                                style="background-color: {{ 'javascript:getRandomColor();' }}"
                                onclick="showLimitFullAlert()">
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
    @if ($lottery_matches->is_active == 1)
        <form action="{{ route('admin.two-d-play.store') }}" method="post" class="p-4">
            @csrf
            <div class="form-header mb-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
               အမြန်ရွေး 
            </button>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="selected_digits">ရွှေးချယ်ထားသောဂဏန်းများ</label>
                    <input type="text" name="selected_digits" id="selected_digits" class="form-control" placeholder="Enter digits">
                </div>

                <div id="amountInputs" class="col-md-12 mb-3"></div>

                <div class="col-md-12 mb-3">
                    <label for="totalAmount">စုစုပေါင်းထိုးကြေး</label>
                    <input type="text" id="totalAmount" name="totalAmount" class="form-control" readonly>
                </div>

                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                <div class="col-12 d-flex justify-content-center mt-3">
                    <button type="submit" class="btn btn-delete mr-3">ဖျက်မည်</button>
                    <button type="submit" class="btn btn-confirm">ထိုးမည်</button>
                </div>
            </div>
        </form>
    @else
        <div class="text-center p-4">
            <h3>Sorry, you can't play now. Please wait for the next round.</h3>
        </div>
    @endif
    </div>
    {{-- choice --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        
      </div>
       <div class="modal-body">
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
                    data-digit="{{ $digit->two_digit }}" onclick="QuickselectDigit('{{ $digit->two_digit }}', this)">
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
                <form action="{{ route('admin.Quickstore') }}" method="post" class="p-4">
                    @csrf
                    <input type="text" id="outputField_ch" name="selected_digits" class="form-control" placeholder="ရွေးချယ်ထားသောဂဏန်းများ">
                    <div id="amountInputs_ch" class="col-md-12 mb-3"></div>

                <div class="col-md-12 mb-3">
                    <label for="totalAmount">totalAmount</label>
                    <input type="text" id="totalAmount_ch" name="totalAmount" class="form-control" readonly>
                </div>

                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                <div class="col-12 d-flex justify-content-center mt-3">
                    <button type="submit" class="btn btn-delete mr-3">ဖျက်မည်</button>
                    <button type="submit" class="btn btn-confirm">ထိုးမည်</button>
                </div>
                </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    {{-- choice --}}
</div>

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
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
         function showLimitFullAlert() {
             Swal.fire({
                 icon: 'info',
                 title: 'Limit Reached',
                 text: 'This two digit\'s amount limit is full.'
             });
         }

         function selectDigit(num, element) {
             const selectedInput = document.getElementById('selected_digits');
             const amountInputsDiv = document.getElementById('amountInputs');

             let selectedDigits = selectedInput.value ? selectedInput.value.split(",") : [];

             // Get the remaining amount for the selected digit
             const remainingAmount = Number(element.querySelector('small').innerText.split(' ')[1]);

             // Check if the user tries to bet more than the remaining amount
             if (selectedDigits.includes(num)) {
                 const betAmountInput = document.getElementById('amount_' + num);

                 if (Number(betAmountInput.value) > remainingAmount) {
                     Swal.fire({
                         icon: 'error',
                         title: 'Bet Limit Exceeded',
                         text: `You can only bet up to ${remainingAmount} for the digit ${num}.`
                     });
                     return;
                 }
             }

             // Check if the digit is already selected
             if (selectedDigits.includes(num)) {
                 // If it is, remove the digit, its style, and its input field
                 selectedInput.value = selectedInput.value.replace(num, '').replace(',,', ',').replace(/^,|,$/g, '');
                 element.classList.remove('selected');

                 const inputToRemove = document.getElementById('amount_' + num);
                 amountInputsDiv.removeChild(inputToRemove);
             } else {
                 // Otherwise, add the digit, its style, and its input field
                 selectedInput.value = selectedInput.value ? selectedInput.value + "," + num : num;
                 element.classList.add('selected');

                 const amountInput = document.createElement('input');
                 amountInput.setAttribute('type', 'number');
                 amountInput.setAttribute('name', 'amounts[' + num + ']');
                 amountInput.setAttribute('id', 'amount_' + num);
                 amountInput.setAttribute('placeholder', 'Amount for ' + num);
                 amountInput.setAttribute('min', '100');
                 amountInput.setAttribute('max', '5000');
                 amountInput.setAttribute('class', 'form-control mt-2');
                 amountInput.onchange = function() {
                     updateTotalAmount();
                     checkBetAmount(this, num);
                 };
                 amountInputsDiv.appendChild(amountInput);
             }
         }


         function QuickselectDigit(num, element) {
             const selectedInput = document.getElementById('selected_digits');
             const amountInputsDiv = document.getElementById('amountInputs');

             let selectedDigits = selectedInput.value ? selectedInput.value.split(",") : [];

             // Get the remaining amount for the selected digit
             const remainingAmount = Number(element.querySelector('small').innerText.split(' ')[1]);

             // Check if the user tries to bet more than the remaining amount
             if (selectedDigits.includes(num)) {
                 const betAmountInput = document.getElementById('amount_' + num);

                 if (Number(betAmountInput.value) > remainingAmount) {
                     Swal.fire({
                         icon: 'error',
                         title: 'Bet Limit Exceeded',
                         text: `You can only bet up to ${remainingAmount} for the digit ${num}.`
                     });
                     return;
                 }
             }

             // Check if the digit is already selected
             if (selectedDigits.includes(num)) {
                 // If it is, remove the digit, its style, and its input field
                 selectedInput.value = selectedInput.value.replace(num, '').replace(',,', ',').replace(/^,|,$/g, '');
                 element.classList.remove('selected');

                 const inputToRemove = document.getElementById('amount_' + num);
                 amountInputsDiv.removeChild(inputToRemove);
             } else {
                 // Otherwise, add the digit, its style, and its input field
                 selectedInput.value = selectedInput.value ? selectedInput.value + "," + num : num;
                 element.classList.add('selected');

                 const amountInput = document.createElement('input');
                 amountInput.setAttribute('type', 'number');
                 amountInput.setAttribute('name', 'amounts[' + num + ']');
                 amountInput.setAttribute('id', 'amount_' + num);
                 amountInput.setAttribute('placeholder', 'Amount for ' + num);
                 amountInput.setAttribute('min', '100');
                 amountInput.setAttribute('max', '5000');
                 amountInput.setAttribute('class', 'form-control mt-2');
                 amountInput.onchange = function() {
                     updateTotalAmount();
                     checkBetAmount(this, num);
                 };
                 amountInputsDiv.appendChild(amountInput);
             }
         }

         
         function checkBetAmount(inputElement, num) {
             // Replace the problematic line with the following code
             const digits = document.querySelectorAll('.digit');
             let digitElement = null;

             for (let i = 0; i < digits.length; i++) {
                 if (digits[i].textContent.includes(num)) {
                     digitElement = digits[i];
                     break;
                 }
             }

             // Ensure that the digitElement was found before proceeding
             if (!digitElement) {
                 console.error('Could not find the digit element for', num);
                 return;
             }

             // Continue with the rest of your function as before
             const remainingAmount = Number(digitElement.querySelector('small').innerText.split(' ')[1]);

             // Check if the entered bet amount exceeds the remaining amount
             if (Number(inputElement.value) > remainingAmount) {
                 Swal.fire({
                     icon: 'error',
                     title: 'Bet Limit Exceeded',
                     text: `You can only bet up to ${remainingAmount} for the digit ${num}.`
                 });
                 inputElement.value = ""; // Reset the input value
             }
         }

        
         // New function to calculate and display the total amount
         function updateTotalAmount() {
             let total = 0;
             const inputs = document.querySelectorAll('input[name^="amounts["]');
             inputs.forEach(input => {
                 total += Number(input.value);
             });

             // Get the user's current balance from the data attribute
             const userBalanceSpan = document.getElementById('userBalance');
             let userBalance = Number(userBalanceSpan.getAttribute('data-balance'));

             // Check if user balance is less than total amount
             if (userBalance < total) {
                 //alert('Your balance is not enough to play two digit.');
                 Swal.fire({
                     icon: 'error',
                     title: 'Oops...',
                     text: 'Your balance is not enough to play two digit. - သင်၏လက်ကျန်ငွေ မလုံလောက်ပါ - ကျေးဇူးပြု၍ ငွေဖြည့်ပါ။',
                     footer: `<a href=
         "{{ route('admin.profiles.index') }}" style="background-color: #007BFF; color: #FFFFFF; padding: 5px 10px; border-radius: 5px; text-decoration: none;">Fill Balance - ငွေဖြည့်သွင်းရန် နိုပ်ပါ </a>`
                 });
                 return; // Exit the function to prevent further changes
             }
             // Decrease the user balance by the total
             userBalance -= total;

             // Update the displayed balance and the data attribute
             userBalanceSpan.textContent = userBalance;
             userBalanceSpan.setAttribute('data-balance', userBalance);

             document.getElementById('totalAmount').value = total;
         }
         // sweet alert
         document.querySelector('form').addEventListener('submit', function(event) {
             event.preventDefault(); // prevent the form from submitting immediately

             Swal.fire({
                 title: 'Are you sure- ထိုးမှာလား ?',
                 text: 'You are about to submit your lottery choices.',
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonText: 'Yes, submit it! - ထိုးမယ်!',
                 cancelButtonText: 'No, cancel! - မထိုးပါ!'
             }).then((result) => {
                 if (result.isConfirmed) {
                     // If the user clicked "Yes", submit the form
                     event.target.submit();
                 }
             });
         });
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
     {{-- choice --}}
     <script>
    //     document.getElementById('zero').addEventListener('click', function() {
    // const digitsStartingWithZero = Array.from(document.querySelectorAll('.digit-button'))
    //     .filter(button => button.getAttribute('data-digit').startsWith('0'))
    //     .map(button => button.getAttribute('data-digit'));
    // console.log(digitsStartingWithZero);

    // // Join the array into a string, separated by commas, spaces, or any other separator you prefer
    // const outputString = digitsStartingWithZero.join(', ');

    // // Set the value of the input field
    // document.getElementById('outputField_ch').value = outputString;
//});

// qiuck select
 function QuickselectDigit(num, element) {
             const selectedInput = document.getElementById('selected_digits');
             const amountInputsDiv = document.getElementById('amountInputs_ch');
             let selectedDigits = selectedInput.value ? selectedInput.value.split(",") : [];
             const remainingAmount = Number(element.querySelector('small').innerText.split(' ')[1]);

             if (selectedDigits.includes(num)) {
                 const betAmountInput = document.getElementById('amount_' + num);

                 if (Number(betAmountInput.value) > remainingAmount) {
                     Swal.fire({
                         icon: 'error',
                         title: 'Bet Limit Exceeded',
                         text: `You can only bet up to ${remainingAmount} for the digit ${num}.`
                     });
                     return;
                 }
             }
             if (selectedDigits.includes(num)) {
                 // If it is, remove the digit, its style, and its input field
                 selectedInput.value = selectedInput.value.replace(num, '').replace(',,', ',').replace(/^,|,$/g, '');
                 element.classList.remove('selected');

                 const inputToRemove = document.getElementById('amount_' + num);
                 amountInputsDiv.removeChild(inputToRemove);
             } else {
                 // Otherwise, add the digit, its style, and its input field
                 selectedInput.value = selectedInput.value ? selectedInput.value + "," + num : num;
                 element.classList.add('selected');
                 const amountInput = document.createElement('input');
                 amountInput.setAttribute('type', 'number');
                 amountInput.setAttribute('name', 'amounts[' + num + ']');
                 amountInput.setAttribute('id', 'amount_' + num);
                 amountInput.setAttribute('placeholder', 'Amount for ' + num);
                 amountInput.setAttribute('min', '100');
                 amountInput.setAttribute('max', '5000');
                 amountInput.setAttribute('class', 'form-control mt-2');
                 amountInput.onchange = function() {
                     QuickupdateTotalAmount();
                     QuickcheckBetAmount(this, num);
                 };
                 amountInputsDiv.appendChild(amountInput);
             }
         }
        //  check bet amount
        function QuickcheckBetAmount(inputElement, num) {
             const digits = document.querySelectorAll('.digit');
             let digitElement = null;

             for (let i = 0; i < digits.length; i++) {
                 if (digits[i].textContent.includes(num)) {
                     digitElement = digits[i];
                     break;
                 }
             }
             if (!digitElement) {
                 console.error('Could not find the digit element for', num);
                 return;
             }
             const remainingAmount = Number(digitElement.querySelector('small').innerText.split(' ')[1]);
             if (Number(inputElement.value) > remainingAmount) {
                 Swal.fire({
                     icon: 'error',
                     title: 'Bet Limit Exceeded',
                     text: `You can only bet up to ${remainingAmount} for the digit ${num}.`
                 });
                 inputElement.value = ""; 
             }
         }
        //  update total amount
        // Function to update the amounts for each selected digit and the total
function QuickupdateAmounts() {
    let totalAmount = 0;
    const amounts = {}; // To store each digit's amount

    // Loop through each selected digit
    const selectedDigits = document.getElementById('outputField_ch').value.split(', ');
    selectedDigits.forEach(digit => {
        // Get the input element for the digit amount
        let amountInput_a = document.querySelector(`input[name^="amounts${digit}"]`);
        if (!amountInput_a) {
            // If the input does not exist, create it
            amountInput_a = document.createElement('input');
            amountInput_a.type = 'number';
            amountInput_a.name = `amounts${digit}`;
            amountInput_a.placeholder = `Amount for ${digit}`;
            amountInput_a.classList.add('form-control', 'mb-2');
            amountInput_a.onchange = handleAmountChange; // A function to handle changes in amount
            document.getElementById('amountInputs_ch').appendChild(amountInput_a);
        }

        // Parse the amount as a number and add to the total
        const amount = parseFloat(amountInput_a.value) || 0;
        amounts[digit] = amount; // Store in the object
        totalAmount += amount; // Add to the total
    });

    // Update the total amount display
    document.getElementById('totalAmount_ch').value = totalAmount.toFixed(2);

    // Log amounts for each digit - this is optional, just for checking
    console.log(amounts);
}

// Function to handle changes in the amount inputs
function handleAmountChange(event) {
    QuickupdateAmounts(); // Update amounts whenever any amount input changes
}

// Modify the event listener for the '0' button to also call updateAmounts
document.getElementById('zero').addEventListener('click', function() {
    const digitsStartingWithZero = Array.from(document.querySelectorAll('.digit-button'))
        .filter(button => button.getAttribute('data-digit').startsWith('0'))
        .map(button => button.getAttribute('data-digit'));
    console.log(digitsStartingWithZero);

    // Join the array into a string, separated by commas, spaces, or any other separator you prefer
    const outputString = digitsStartingWithZero.join(', ');

    // Set the value of the input field
    document.getElementById('outputField_ch').value = outputString;

    QuickupdateAmounts(); // Call this function to create/update the amount inputs
});

// Call updateAmounts on page load or when needed to initialize
QuickupdateAmounts();

        // function QuickupdateTotalAmount() {
        //      let total = 0;
        //      const inputs = document.querySelectorAll('input[name^="amounts["]');
        //      inputs.forEach(input => {
        //          total += Number(input.value);
        //      });
        //      const userBalanceSpan = document.getElementById('userBalance');
        //      let userBalance = Number(userBalanceSpan.getAttribute('data-balance'));
        //      if (userBalance < total) {
                 
        //          Swal.fire({
        //              icon: 'error',
        //              title: 'Oops...',
        //              text: 'Your balance is not enough to play two digit. - သင်၏လက်ကျန်ငွေ မလုံလောက်ပါ - ကျေးဇူးပြု၍ ငွေဖြည့်ပါ။',
        //              footer: `<a href=
        //  "{{ route('admin.profiles.index') }}" style="background-color: #007BFF; color: #FFFFFF; padding: 5px 10px; border-radius: 5px; text-decoration: none;">Fill Balance - ငွေဖြည့်သွင်းရန် နိုပ်ပါ </a>`
        //          });
        //          return; 
        //      }            
        //      userBalance -= total;
        //      userBalanceSpan.textContent = userBalance;
        //      userBalanceSpan.setAttribute('data-balance', userBalance);

        //      document.getElementById('totalAmount_ch').value = total;
        //  }
     </script>
@endsection

