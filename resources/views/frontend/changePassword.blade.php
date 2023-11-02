@extends('user_layouts.master')
@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css">
@endsection
@section('content')
<div style="height: 100vh;">
    <h6 class="text-center p-3 font-weight-bold" style="color: #ab0000;">လျှို့ဝှက်နံပါတ်ပြောင်းမည်</h6>
    <div class="container">
        <form action="{{ route('user.changeNewPassword', Auth::user()->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
            <input type="password" class="form-control" placeholder="လျှို့ဝှက်နံပါတ်အဟောင်း" name="current_password" id="current_password">
            </div>
            <p class="text-center mt-1" style="font-size: 13px;">ကျေးဇူးပြု၍လျှို့ဝှက်နံပါတ်အသစ်ကိုနှစ်ကြိမ်ရိုက်ထည့်ပါ။</p>
            <p class="text-center mt-1 text-success" style="font-size: 13px;">မှတ်ချက် - လျှို့ဝှက်နံပါတ် နှစ်ခုတူညီရပါမည်</p>
            <div class="form-group">
            <input type="password" class="form-control" placeholder="လျှို့ဝှက်နံပါတ်အသစ်" name="new_password" id="new_password">
            </div>
            <div class="form-group mt-4">
            <input type="password" class="form-control" placeholder="အတည်လျှို့ဝှက်နံပါတ်" name="new_password_confirmation" id="new_password_confirmation">
            </div>
            <a href=""><p class="text-danger" style="font-size: 14px;text-align: right;text-decoration: none;">လျှို့ဝှက်နံပါတ်မေ့နေပါသလား?</p></a>
            <div class="form-group">
            <button type="submit" class="pw-btn btn">ပြောင်းမည်</button>
            </div>

        </form>
        <div class="row m-2">
            <div class="col-lg-12 mx-auto font-weight-bold" style="color: #ab0000;">
                <p>လျှို့ဝှက်နံပါတ်</p>
                <p>1. အကောင့်ဝင်ရန် အသုံးပြုရမည်<br /></p>
                <p>2. ငွေထုတ်ယူရန် အသုံးပြုရမည်</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <p class="text-danger font-weight-bold">အကောင့်လုံခြုံမှုရှိစေရန် သင်၏ လျှို့ဝှက်နံပါတ် ကို မည်သူ့ကိုမျှမပြောပါနှင့်။</p>
            </div>
        </div>
    </div>
</div>
@endsection
@include('user_layouts.footer')


@section('script')

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
<script>
   document.addEventListener('DOMContentLoaded', function () {
    @if(session('passwordChanged'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('passwordChanged') }}',
            timer: 3000,
            showConfirmButton: false
        });
    @elseif(session('passwordMismatch'))
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: '{{ session('passwordMismatch') }}',
            showConfirmButton: true
        });
    @endif
});

</script>
{{-- <script>
document.addEventListener('DOMContentLoaded', function () {
    @if(session('passwordChanged'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('passwordChanged') }}',
            timer: 3000,
            showConfirmButton: false
        });
    @endif
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    @if(session('passwordMismatch'))
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: '{{ session('passwordMismatch') }}',
            showConfirmButton: true
        });
    @endif
});
</script> --}}

@endsection
