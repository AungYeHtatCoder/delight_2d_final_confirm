@extends('user_layouts.master')

@section('content')

<div style="height: 90vh;">
    <h6 class="m-3 text-center text-danger">ထိုးမည့်ဂဏန်းများ</h6>
    <form method="POST" action="{{ route('admin.ThreeDigitPlaystore') }}">
  @csrf 
  <table class="table text-center threed-table">
    <tbody>
    <!-- JavaScript will insert rows here -->
    </tbody>
  </table>
  <hr>
  <div class="d-flex justify-content-around">
     <label for="total_amount">Total</label>
     <input type="text" class="form-control" name="total_amount" id="total_amount" readonly>
    </div>
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
  <button type="submit" class="btn threeplay-btn text-white d-block mx-2 mt-3" style="background: #ab0000">ထိုးမည်</button>
</form>
    <hr>
    <div class="text-center" style="background: #d2d4d6; border-radius: 5px;padding: 5px;">
        <p>Balance</p>
        <p>
         <span class="font-green d-block" id="userBalance"
            data-balance="{{ Auth::user()->balance }}">လက်ကျန်ငွေ - {{ Auth::user()->balance }}
            MMK
        </span>
        </p>
    </div>
    {{-- <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <h6 class="m-0 text-center">ထိုးမည့်ဂဏန်းများ</h6>
            </div>
            <div class="card-body">
              <table class="table">
                <thead>
                  <th>digit</th>
                  <th>sub_amount</th>
                  <th>remainingAmounts</th>
                </thead>
                <tbody>
                   @forEach($threeDigits as $digit)
                <tr>
                  <td>
                    {{ $digit->digit_entry }}
                  </td>
                  <td>
                    {{ $digit->sub_amount }}
                  </td>
                  <td>
                    {{ $remainingAmounts[$digit->id] }}
                  </td>
                </tr>
                
                @endforEach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
    <div class="threeplay-footer py-3 fixed-bottom text-center">
        <div class="d-flex justify-content-center">
            <a href="{{ route('admin.ThreeDigitPlay') }}" class="btn removeplay-btn btn-outline-danger d-block mx-2">ပေါက်ဂဏန်းပြန်ရွှေးမည်</a>
            {{-- <a href="" class="btn threeplay-btn text-white d-block mx-2" style="background: #ab0000">Play</a> --}}
        </div>
    </div>
    </form>
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
 {{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
     @if(session('SuccessRequest'))
         Swal.fire({
             icon: 'success',
             title: 'Success!',
             text: '{{ session('AmountLimitFul') }}',
             timer: 3000,
             showConfirmButton: false
         });
     @endif
 }); --}}

 </script>
<script>
 document.addEventListener('DOMContentLoaded', function() {
  // Retrieve and parse the stored digits
  var storedDigits = JSON.parse(localStorage.getItem('chosenDigits') || '[]');

  // Find the table body where we want to add the rows
  var tableBody = document.querySelector('.threed-table tbody');

  // Clear any existing rows (optional)
  tableBody.innerHTML = '';

  // Add a new row for each digit
  storedDigits.forEach(function(digit, index) {
    var row = `<tr>
      <td>${index + 1}</td>
      <td>
       <input type="text" name="digit[]" value="${digit}" class="form-control" readonly 
       </td>
      <td>
        <input type="text" name="sub_amount[]" placeholder="ထိုးကြေးသတ်မှတ်ပါ (100)" class="form-control" required>
      </td>
      <td>
       <div class="d-flex">
        <button type="button" onclick="removeDigit(this, '${digit}')"><i class="fa-regular fa-trash-can text-danger"></i></button>
       </div>
      </td>
     </tr>`;
    tableBody.insertAdjacentHTML('beforeend', row);
  });
  document.querySelectorAll('input[name="sub_amount[]"]').forEach(function(input) {
    input.addEventListener('change', updateTotalAndBalance);
  });
  // Attach event listener to Confirm Play button
  var confirmPlayButton = document.querySelector('.threeplay-btn'); // Adjust the selector if necessary
  confirmPlayButton.addEventListener('click', function(event) {
    // Remove the chosenDigits from localStorage
    localStorage.removeItem('chosenDigits');
  });
});

// total amount 
function updateTotalAndBalance() {
  var subAmountInputs = document.querySelectorAll('input[name="sub_amount[]"]');
  var total = 0;
  subAmountInputs.forEach(function(input) {
    var amount = parseFloat(input.value) || 0;
    total += amount;
  });
  
  var totalAmountInput = document.getElementById('total_amount');
  totalAmountInput.value = total.toFixed(2); // Assuming 2 decimal places for currency
  
  var userBalanceSpan = document.getElementById('userBalance');
  var balance = parseFloat(userBalanceSpan.getAttribute('data-balance'));
  var newBalance = balance - total;

  // Check if balance is less than the total bet amount
  if (newBalance < 0) {
    // If balance is not enough, show an alert and reset the total amount
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Your balance is not enough to play two digit. - သင်၏လက်ကျန်ငွေ မလုံလောက်ပါ - ကျေးဇူးပြု၍ ငွေဖြည့်ပါ။',
      footer: `<a href="{{ route('admin.profiles.index') }}" style="background-color: #007BFF; color: #FFFFFF; padding: 5px 10px; border-radius: 5px; text-decoration: none;">Fill Balance - ငွေဖြည့်သွင်းရန် နိုပ်ပါ </a>`
    });

    // Reset the total amount to what it was before
    totalAmountInput.value = (balance - parseFloat(totalAmountInput.value)).toFixed(2);
    return; // Exit the function to prevent updating the balance
  }
  
  // Update the balance text content only if the new balance is positive
  userBalanceSpan.textContent = 'လက်ကျန်ငွေ - ' + newBalance.toFixed(2) + ' MMK';
  // Check if any input amount exceeds the limit
  document.querySelectorAll('input[name="sub_amount[]"]').forEach(function(input, index) {
    checkBetAmount(input, index);
  });
}

// Add event listener to sub_amount inputs for change in value
// document.querySelectorAll('input[name="sub_amount[]"]').forEach(function(input) {
//   input.addEventListener('change', updateTotalAndBalance);
// });

function checkBetAmount(inputElement, index) {
  // Assuming that the max bet amount for any three-digit is 5000 MMK
  const maxBetAmount = 5000;
  
  // Check if the entered bet amount exceeds the max bet amount
  if (Number(inputElement.value) > maxBetAmount) {
    Swal.fire({
      icon: 'error',
      title: 'Bet Limit Exceeded',
      text: `You can only bet up to ${maxBetAmount} MMK for any three-digit number.`
    });
    inputElement.value = ""; // Reset the input value
  }
}

// Function to update the total and balance display
// function updateTotalAndBalance() {
//   var subAmountInputs = document.querySelectorAll('input[name="sub_amount[]"]');
//   var total = 0;
//   subAmountInputs.forEach(function(input) {
//     var amount = parseFloat(input.value) || 0;
//     total += amount;
//   });
  
//   var totalAmountInput = document.getElementById('total_amount');
//   totalAmountInput.value = total.toFixed(2); // Assuming 2 decimal places for currency
  
//   var userBalanceSpan = document.getElementById('userBalance');
//   var balance = parseFloat(userBalanceSpan.getAttribute('data-balance'));
//   var newBalance = balance - total;
//   userBalanceSpan.textContent = 'လက်ကျန်ငွေ - ' + newBalance.toFixed(2) + ' MMK';
// }

// // Add event listener to sub_amount inputs for change in value
// document.querySelectorAll('input[name="sub_amount[]"]').forEach(function(input) {
//   input.addEventListener('change', updateTotalAndBalance);
// });


// Add event listeners for edit and remove buttons if needed
function editDigit(button) {
  // Logic to edit a digit
}

function removeDigit(button, digit) {
  var storedDigits = JSON.parse(localStorage.getItem('chosenDigits') || '[]');
  var index = storedDigits.indexOf(digit);
  if (index > -1) {
    storedDigits.splice(index, 1);
    localStorage.setItem('chosenDigits', JSON.stringify(storedDigits));
  }
  button.closest('tr').remove();

}

</script>

@endsection