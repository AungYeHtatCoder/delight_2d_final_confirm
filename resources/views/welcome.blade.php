@extends('user_layouts.master')
@section('style')
<style>
    .content-color {
    background-color: #c91515;
}

</style>
@endsection
@section('profile')
@include('user_layouts.profile1')
@endsection
@section('content')
<div class="row justify-content-around" style="margin-top: 30px;">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach($banners as $key=>$banner)
            <div class="carousel-item active {{ $loop->first ? 'active' : '' }}">
                <img src="{{ $banner->img_url }}" style="max-height: 500px;" class="d-block w-100" alt="...">
                <marquee behavior="" direction="" style="background-color: blue; color:aliceblue">
                    Thai 2D - 3D App သည် Thai နိုင်ငံ Official App ဖြစ်ပြီး ၂၄ နာရီ ကြားခံမလိုပဲ ငွေသွင်းငွေထုတ်လုပ်နိုင်ပါသည်။
                </marquee>
            </div>
            @endforeach
            <div class="carousel-item">
                <img src="{{ $banner->img_url }}" style="max-height: 500px;" class="d-block w-100" alt="...">
                <marquee behavior="" direction="" style="background-color: blue; color:aliceblue">
                    Thai 2D - 3D App သည် Thai နိုင်ငံ Official App ဖြစ်ပြီး ၂၄ နာရီ ကြားခံမလိုပဲ ငွေသွင်းငွေထုတ်လုပ်နိုင်ပါသည်။
                </marquee>
            </div>
            <div class="carousel-item">
                <img src="{{ $banner->img_url }}" style="max-height: 500px;" class="d-block w-100" alt="...">
                <marquee behavior="" direction="" style="background-color: blue; color:aliceblue">
                    Thai 2D - 3D App သည် Thai နိုင်ငံ Official App ဖြစ်ပြီး ၂၄ နာရီ ကြားခံမလိုပဲ ငွေသွင်းငွေထုတ်လုပ်နိုင်ပါသည်။
                </marquee>
            </div>
        </div>
    </div>
</div>
<div class="my-3">
    <div class="d-flex justify-content-around content-color">
        <div class="">
            <div class="item-box"><h4><a href="{{ route('admin.GetTwoDigit') }}">2D PLAY</a></h4></div>
            <a href="{{ route('admin.GetTwoDigit') }}" style="text-decoration: none;">
            <p class="item-text font-weight-bold">2D</p>
            </a>
        </div>
        <div class="">
            <div class="item-box"><h4><a href="">3D PLAY</a></h4></div>
            <a href="" style="text-decoration: none;">
            <p class="item-text font-weight-bold">3D</p>
            </a>
        </div>
    </div>
    <div class="d-flex justify-content-around content-color">
        <div class="">
            <div class="image-box"><h4><a href=""><img class="w-100" src="{{ asset('/user_app/assets/img/logo/logo1.jpg') }}" alt=""></a></h4></div>
            <a href="" style="text-decoration: none;">
                <p class="item-text">2D</p>
            </a>
        </div>
        <div class="">
            <div class="image-box">
                <h4>
                    <a href="">
                        <img class="w-100" src="{{ asset('/user_app/assets/img/logo/logo1.jpg') }}" alt="">
                    </a>
                </h4>
            </div>
            <a href="" style="text-decoration: none;">
                <p class="item-text">3D</p>
            </a>
        </div>
    </div>
    
</div>
@endsection
