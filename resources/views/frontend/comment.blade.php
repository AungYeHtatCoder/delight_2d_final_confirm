@extends('user_layouts.master')

@section('content')
<div style="min-height: 100vh;">
    <h6 class="text-center py-4">အကြံပြုရန်</h6>
    <form action="" method="post">
        <div class="mb-3">
            <input type="text" placeholder="အကြောင်းအရာ" class="form-control">
        </div>
        <div class="mb-3">
            <textarea name="" placeholder="အသေးစိတ်" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="d-flex justify-content-around">
            <div>
                <a href="{{ url('/user_dashboard') }}" class="btn btn-secondary px-5 py-2">ဖျက်ရန်</a>
            </div>
            <div>
                <button type="submit" class="btn btn-danger px-5 py-2">ပို့ရန်</button>
            </div>
        </div>
    </form>
</div>
@endsection
@include('user_layouts.footer')
