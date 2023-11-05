@extends('user_layouts.master')

@section('content')
<!-- content section -->
<div style="height: 90vh;">
    <h6 class="m-3 text-center text-danger">ထိုးမည့်ဂဏန်းများ</h6>
    <table class="table text-center threed-table">
     <tr>
      <th>စဉ်</th>
      <th>ဂဏန်း</th>
      <th>ငွေပမာဏ</th>
      <th>ပြင် / ဖျက်</th>
     </tr>
     <tr>
      <td>1</td>
      <td>123</td>
      <td>100</td>
      <td>
       <div class="d-flex">
        <a href=""><i class="fa-regular fa-pen-to-square mx-3"></i></a>
        <a href=""><i class="fa-regular fa-trash-can text-danger"></i></a>
       </div>
      </td>
     </tr>
     <tr>
      <td>2</td>
      <td>223</td>
      <td>100</td>
      <td>
       <div class="d-flex">
        <a href=""><i class="fa-regular fa-pen-to-square mx-3"></i></a>
        <a href=""><i class="fa-regular fa-trash-can text-danger"></i></a>
       </div>
      </td>
     </tr>
      <tr>
      <td>3</td>
      <td>223</td>
      <td>100</td>
      <td>
       <div class="d-flex">
        <a href=""><i class="fa-regular fa-pen-to-square mx-3"></i></a>
        <a href=""><i class="fa-regular fa-trash-can text-danger"></i></a>
       </div>
      </td>
     </tr>
    </table><hr>
    <div class="d-flex justify-content-around">
     <p>စုစုပေါင်းငွေပမာဏ</p>
     <p>200 ကျပ်</p>
    </div><hr>
    <div class="text-center" style="background: #d2d4d6; border-radius: 5px;padding: 5px;">
        <p>လက်ကျန်ငွေ</p>
        <p>0 ကျပ်</p>
    </div>
    <!-- winner result -->
    <div class="threeplay-footer py-3 fixed-bottom text-center">
        <div class="d-flex justify-content-center">
            <a href="{{ route('admin.ThreeDigitPlay') }}" class="btn removeplay-btn btn-outline-danger d-block mx-2">ပြန်ရွေးမည်</a>
            <a href="" class="btn threeplay-btn text-white d-block mx-2" style="background: #ab0000">ထိုးမည်</a>
        </div>
    </div>
    <!-- winner result -->
</div>
<!-- content section -->


@endsection
