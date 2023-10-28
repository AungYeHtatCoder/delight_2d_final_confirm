@extends('user_layouts.master')

{{-- @section('profile')
@include('user_layouts.profile2')
@endsection --}}

@section('content')
<div class="card my-3 py-3" style="background: linear-gradient(to right, #267871, #136a8a);; border-radius: 10px;">
    <a href="{{ url('/promo/promo-detail') }}" style="cursor: pointer;color: #fff; text-decoration: none;">
        <div class="row">
            <div class="col-3  d-flex align-items-start">
                <img src="{{ asset('/user_app/assets/img/logo/logo1.jpg') }}" alt="" class="w-100 m-2" style="width:100px;height: 70px;border-radius: 50%;">
            </div>
            <div class="col-7 ">
                <div>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard .
                </div>
            </div>
            <div class="col-2  d-flex align-items-center fw-bold" style="font-size: 25px;">
                <span class="fas fa-angle-right"></span>
            </div>
        </div>
    </a>
</div>
<div class="card my-3 py-3" style="background: linear-gradient(to right, #267871, #136a8a);; border-radius: 10px;">
    <a href="{{ url('/promo/promo-detail') }}" style="cursor: pointer;color: #fff; text-decoration: none;">
        <div class="row">
            <div class="col-3  d-flex align-items-start">
                <img src="{{ asset('/user_app/assets/img/logo/logo1.jpg') }}" alt="" class="w-100 m-2" style="width:100px;height: 70px;border-radius: 50%;">
            </div>
            <div class="col-7 ">
                <div>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard .
                </div>
            </div>
            <div class="col-2  d-flex align-items-center fw-bold" style="font-size: 25px;">
                <span class="fas fa-angle-right"></span>
            </div>
        </div>
    </a>
</div>
<div class="card my-3 py-3" style="background: linear-gradient(to right, #267871, #136a8a);; border-radius: 10px;">
    <a href="{{ url('/promo/promo-detail') }}" style="cursor: pointer;color: #fff; text-decoration: none;">
        <div class="row">
            <div class="col-3  d-flex align-items-start">
                <img src="{{ asset('/user_app/assets/img/logo/logo1.jpg') }}" alt="" class="w-100 m-2" style="width:100px;height: 70px;border-radius: 50%;">
            </div>
            <div class="col-7 ">
                <div>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard .
                </div>
            </div>
            <div class="col-2  d-flex align-items-center fw-bold" style="font-size: 25px;">
                <span class="fas fa-angle-right"></span>
            </div>
        </div>
    </a>
</div>
<div class="card my-3 py-3" style="background: linear-gradient(to right, #267871, #136a8a);; border-radius: 10px;">
    <a href="{{ url('/promo/promo-detail') }}" style="cursor: pointer;color: #fff; text-decoration: none;">
        <div class="row">
            <div class="col-3  d-flex align-items-start">
                <img src="{{ asset('/user_app/assets/img/logo/logo1.jpg') }}" alt="" class="w-100 m-2" style="width:100px;height: 70px;border-radius: 50%;">
            </div>
            <div class="col-7 ">
                <div>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard .
                </div>
            </div>
            <div class="col-2  d-flex align-items-center fw-bold" style="font-size: 25px;">
                <span class="fas fa-angle-right"></span>
            </div>
        </div>
    </a>
</div>
@endsection
