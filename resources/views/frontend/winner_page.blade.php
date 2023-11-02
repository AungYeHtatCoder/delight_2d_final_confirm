@extends('user_layouts.master')
@section('style')
<style>
    .content-color {
    background-color: #c91515;
}

</style>
@endsection
@section('content')
          <!-- header -->
          <div class="winner-card">
            <p>2D ကံထူးရှင် (100) ဦးစာရင်း</p>
          </div>
          <div class="d-flex mt-1 text-danger" style="justify-content: space-between;">
            <div>
             <p>Updated at: <br><span class="font-weight-bold">Oct 26, 2023, 10:30AM</span></p>
            </div>
            <span class="font-weight-bold" style="font-size: 30px;color: #ab0000;">14</span>
          </div>
          <!-- header -->
          <!-- table -->
          <div class="p-3 shadow" style="margin-bottom: 100px;">
            <table class="winner-table table table-striped">
              <tr>
               <td class="mt-2">1.</td>
               <td><i class="fa-regular fa-circle-user" style="font-size: 50px;"></i></td>
               <td><span>UserName</span> <p>091234567</p></td>
               <td><span>ထိုးငွေ</span> <p>50,000ကျပ်</p></td>
               <td><span>ထီပေါက်ငွေ</span> <p>100,000ကျပ်</p></td>
              </tr>
              <tr>
               <td class="mt-2">2.</td>
               <td><i class="fa-regular fa-circle-user" style="font-size: 50px;"></i></td>
               <td><span>UserName</span> <p>091234567</p></td>
               <td><span>ထိုးငွေ</span> <p>50,000ကျပ်</p></td>
               <td><span>ထီပေါက်ငွေ</span> <p>100,000ကျပ်</p></td>
              </tr>
              <tr>
               <td class="mt-2">3.</td>
               <td><i class="fa-regular fa-circle-user" style="font-size: 50px;"></i></td>
               <td><span>UserName</span> <p>091234567</p></td>
               <td><span>ထိုးငွေ</span> <p>50,000ကျပ်</p></td>
               <td><span>ထီပေါက်ငွေ</span> <p>100,000ကျပ်</p></td>
              </tr>
              <tr>
               <td class="mt-2">4.</td>
               <td><i class="fa-regular fa-circle-user" style="font-size: 50px;"></i></td>
               <td><span>UserName</span> <p>091234567</p></td>
               <td><span>ထိုးငွေ</span> <p>50,000ကျပ်</p></td>
               <td><span>ထီပေါက်ငွေ</span> <p>100,000ကျပ်</p></td>
              </tr>
              <tr>
               <td class="mt-2">5.</td>
               <td><i class="fa-regular fa-circle-user" style="font-size: 50px;"></i></td>
               <td><span>UserName</span> <p>091234567</p></td>
               <td><span>ထိုးငွေ</span> <p>50,000ကျပ်</p></td>
               <td><span>ထီပေါက်ငွေ</span> <p>100,000ကျပ်</p></td>
              </tr>
              <tr>
               <td class="mt-2">6.</td>
               <td><i class="fa-regular fa-circle-user" style="font-size: 50px;"></i></td>
               <td><span>UserName</span> <p>091234567</p></td>
               <td><span>ထိုးငွေ</span> <p>50,000ကျပ်</p></td>
               <td><span>ထီပေါက်ငွေ</span> <p>100,000ကျပ်</p></td>
              </tr>
              <tr>
               <td class="mt-2">7.</td>
               <td><i class="fa-regular fa-circle-user" style="font-size: 50px;"></i></td>
               <td><span>UserName</span> <p>091234567</p></td>
               <td><span>ထိုးငွေ</span> <p>50,000ကျပ်</p></td>
               <td><span>ထီပေါက်ငွေ</span> <p>100,000ကျပ်</p></td>
              </tr>
              <tr>
               <td class="mt-2">8.</td>
               <td><i class="fa-regular fa-circle-user" style="font-size: 50px;"></i></td>
               <td><span>UserName</span> <p>091234567</p></td>
               <td><span>ထိုးငွေ</span> <p>50,000ကျပ်</p></td>
               <td><span>ထီပေါက်ငွေ</span> <p>100,000ကျပ်</p></td>
              </tr>
            </table>
          </div>
          <!-- table -->
@endsection

@include('user_layouts.footer')
