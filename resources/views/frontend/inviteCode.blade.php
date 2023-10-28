@extends('user_layouts.master')

@section('content')
<div class="">
    <div class="text-center m-3"><img src="{{ asset('user_app/assets/img/friends.svg') }}" width="200px" height="150px" alt="">
        <p class="mx-5">သင်၏မိတ်ဆက်ကုဒ်</p>
    </div>
    <p class="p-2">သင့်အား App ကိုမိတ်ဆက်ပေးသောသူ၏ မိတ်ဆက်ကုဒ်ကို ဖြည့်ပါ။(သင်၏မိတ်ဆက်ကုဒ်ကို ဖြည့်ရန်မဟုတ်ပါ)</p>
  </div>
  <div class="">
    <div class="">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="မိတ်ဆက်ကုဒ်" name="" id="">
            <p class="text-danger font-weight-bold mt-2" style="font-size: 14px;">မိတ်ဆက်ကုဒ် လိုအပ်ပါသည်</p>
          </div>
          <div class="form-group mt-3">
            <a href="" class="pw-btn btn">ဆက်လုပ်ရန်</a>
          </div>
        </div>
      </div>
@endsection
