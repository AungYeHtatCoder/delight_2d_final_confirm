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

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        let remainingAmounts = {};

        function updateRemainingAmounts() {
            fetch('/admin/three-d-play-confirm-api-format') // Correct endpoint for your application
                .then(response => response.json())
                .then(data => {
                    remainingAmounts = data.remainingAmounts;
                })
                .catch(error => console.error('Error fetching remaining amounts:', error));
        }
        updateRemainingAmounts();

        var storedDigits = JSON.parse(localStorage.getItem('chosenDigits') || '[]');
        var tableBody = document.querySelector('.threed-table tbody');
        renderDigitsTable();

        function renderDigitsTable() {
            tableBody.innerHTML = '';
            storedDigits.forEach(function(digit, index) {
                var row = createTableRow(digit, index);
                tableBody.insertAdjacentHTML('beforeend', row);
            });
        }

        function createTableRow(digit, index) {
            return `<tr>
                <td>${index + 1}</td>
                <td>
                    <input type="text" name="digit[]" value="${digit}" class="form-control" readonly>
                </td>
                <td>
                    <input type="text" name="sub_amount[]" placeholder="Enter bet amount (e.g., 100)" class="form-control" required>
                </td>
                <td>
                    <button type="button" class="btn btn-link remove-digit-btn" data-digit="${digit}">
                        <i class="fa-regular fa-trash-can text-danger"></i>
                    </button>
                </td>
            </tr>`;
        }

        function attachRemoveDigitEventListeners() {
            document.querySelectorAll('.remove-digit-btn').forEach(button => {
                button.addEventListener('click', function() {
                    var digit = this.getAttribute('data-digit');
                    removeDigit(digit);
                });
            });
        }

        function removeDigit(digit) {
            var index = storedDigits.indexOf(digit);
            if (index > -1) {
                storedDigits.splice(index, 1);
                localStorage.setItem('chosenDigits', JSON.stringify(storedDigits));
                renderDigitsTable();
                updateTotalAndBalance();
            }
        }

        document.querySelectorAll('input[name="sub_amount[]"]').forEach(function(input) {
            input.addEventListener('change', updateTotalAndBalance);
        });

        var confirmPlayButton = document.querySelector('.threeplay-btn');
        confirmPlayButton.addEventListener('click', function(event) {
            localStorage.removeItem('chosenDigits');
            console.log("Confirm Play button clicked.");
            location.reload();
        });

        function updateTotalAndBalance() {
            var subAmountInputs = document.querySelectorAll('input[name="sub_amount[]"]');
            var total = 0;
            subAmountInputs.forEach(function(input) {
                var amount = parseFloat(input.value) || 0;
                total += amount;
            });

            var totalAmountInput = document.getElementById('total_amount');
            totalAmountInput.value = total.toFixed(2);

            var userBalanceSpan = document.getElementById('userBalance');
            var balance = parseFloat(userBalanceSpan.getAttribute('data-balance'));
            var newBalance = balance - total;

            if (newBalance < 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Your balance is not enough to play three digits.',
                    footer: '<a href="link-to-recharge-balance">Recharge Balance</a>'
                });

                totalAmountInput.value = balance.toFixed(2);
                return;
            }

            userBalanceSpan.textContent = `Balance - ${newBalance.toFixed(2)} MMK`;
            subAmountInputs.forEach(function(input, index) {
                checkBetAmount(input, storedDigits[index]);
            });
        }

        function checkBetAmount(inputElement, digitId) {
  // Check if the remainingAmounts have been loaded
  if (Object.keys(remainingAmounts).length === 0) {
    // Since the remaining amounts have not been loaded yet, don't allow any action
    inputElement.value = ""; // Clear the input
    Swal.fire({
      icon: 'warning',
      title: 'Please wait...',
      text: 'The bet limits are still loading. Please wait a moment and try again.'
    });
    return; // Exit the function
  }

  const remainingAmount = remainingAmounts[digitId];
  if (remainingAmount === undefined) {
    // If the remaining amount for the digit is not defined, also prevent betting
    inputElement.value = ""; // Clear the input
    Swal.fire({
      icon: 'error',
      title: 'Bet Limit Not Found',
      text: 'Cannot find the bet limit for this digit. Please refresh the page or contact support if the issue persists.'
    });
    return; // Exit the function
  }

  // If the entered bet amount exceeds the remaining amount, show an error
  if (Number(inputElement.value) > remainingAmount) {
    Swal.fire({
      icon: 'error',
      title: 'Bet Limit Exceeded',
      text: `You can only bet up to ${remainingAmount} MMK for this digit.`
    });
    inputElement.value = remainingAmount; // Set the input to the maximum remaining amount
  }

  updateTotalAndBalance(); // Update the total balance display
}
        attachRemoveDigitEventListeners();
    });


    // function checkBetAmount(inputElement, digitId) {
        //     // Check if the remainingAmounts have been loaded
        //     if (!remainingAmounts || Object.keys(remainingAmounts).length === 0) {
        //         Swal.fire({
        //             icon: 'error',
        //             title: 'Please wait...',
        //             text: 'The bet limits are still loading. Please wait a moment and try again.'
        //         });
        //         // Optionally, reset the input value
        //         inputElement.value = "";
        //         return;
        //     }

        //     const remainingAmount = remainingAmounts[digitId] || 0;

        //     // Check if the entered bet amount exceeds the remaining amount
        //     if (Number(inputElement.value) > remainingAmount) {
        //         Swal.fire({
        //             icon: 'error',
        //             title: 'Bet Limit Exceeded',
        //             text: `You can only bet up to ${remainingAmount} MMK for this digit.`
        //         });
        //         // Optionally, reset the input value
        //         inputElement.value = "";
        //     }
        // }
</script>
@endsection
