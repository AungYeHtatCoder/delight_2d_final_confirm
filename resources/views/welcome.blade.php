@extends('user_layouts.master')

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
                <marquee behavior="" direction="">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, odio! Amet inventore, modi perferendis consequuntur reiciendis, ducimus incidunt ut exercitationem tempora autem aliquam nostrum illum deleniti labore consectetur blanditiis sed.
                </marquee>
            </div>
            @endforeach
            {{-- <div class="carousel-item">
                <img src="{{ asset('user_app/assets/img/banners/lotto2.png') }}" style="max-height: 500px;" class="d-block w-100" alt="...">
                <marquee behavior="" direction="">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, odio! Amet inventore, modi perferendis consequuntur reiciendis, ducimus incidunt ut exercitationem tempora autem aliquam nostrum illum deleniti labore consectetur blanditiis sed.
                </marquee>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('user_app/assets/img/banners/lotto3.png') }}" style="max-height: 500px;" class="d-block w-100" alt="...">
                <marquee behavior="" direction="">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, odio! Amet inventore, modi perferendis consequuntur reiciendis, ducimus incidunt ut exercitationem tempora autem aliquam nostrum illum deleniti labore consectetur blanditiis sed.
                </marquee>
            </div> --}}
        </div>
    </div>
</div>
<div class="my-3">
    <div class="d-flex justify-content-around">
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
    <div class="d-flex justify-content-around">
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
                <p class="item-text">2D</p>
            </a>
        </div>
    </div>
    <div class="d-flex justify-content-around">
        <div class="">
            <div class="image-box"><h4><a href=""><img class="w-100" src="{{ asset('/user_app/assets/img/logo/logo1.jpg') }}" alt=""></a></h4></div>
            <a href="" style="text-decoration: none;"><p class="item-text">2D</p></a>
        </div>
        <div class="">
            <div class="image-box"><h4><a href=""><img class="w-100" src="{{ asset('/user_app/assets/img/logo/logo1.jpg') }}" alt=""></a></h4></div>
            <a href="" style="text-decoration: none;"><p class="item-text">2D</p></a>
        </div>
    </div>
    <div class="d-flex justify-content-around">
        <div class="">
            <div class="image-box"><h4><a href=""><img class="w-100" src="{{ asset('/user_app/assets/img/logo/logo1.jpg') }}" alt=""></a></h4></div>
            <a href="" style="text-decoration: none;"><p class="item-text">2D</p></a>
        </div>
        <div class="">
            <div class="image-box"><h4><a href=""><img class="w-100" src="{{ asset('/user_app/assets/img/logo/logo1.jpg') }}" alt=""></a></h4></div>
            <a href="" style="text-decoration: none;"><p class="item-text">2D</p></a>
        </div>
    </div>
    <div class="d-flex justify-content-around">
        <div class="">
            <div class="image-box"><h4><a href=""><img class="w-100" src="{{ asset('/user_app/assets/img/logo/logo1.jpg') }}" alt=""></a></h4></div>
            <a href="" style="text-decoration: none;"><p class="item-text">2D</p></a>
        </div>
        <div class="">
            <div class="image-box"><h4><a href=""><img class="w-100" src="{{ asset('/user_app/assets/img/logo/logo1.jpg') }}" alt=""></a></h4></div>
            <a href="" style="text-decoration: none;"><p class="item-text">2D</p></a>
        </div>
    </div>
</div>
@endsection
