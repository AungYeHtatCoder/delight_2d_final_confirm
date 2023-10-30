@extends('user_layouts.master')

@section('profile')
@include('user_layouts.profile2')
@endsection

@section('content')
    <!-- cards section -->
    <div class="card mb-5 child-div">
        <div class="row pt-2 text-center">
            <div class="col">
                <a href="{{ route('user.UserKpayFillMoney') }}" style="color: black; text-decoration: none;">
                    <i class="fa-solid fa-money-bill-1"></i>
                    <p style="font-size: 11px;">KPay - ငွေဖြည့်</p>
                </a>
            </div>
            <div class="col">
                <a href="{{ url('/withDraw') }}" style="color: black; text-decoration: none;">
                    <i class="fa-solid fa-money-bill-transfer"></i>
                    <p style="font-size: 11px;">KPay - ငွေထုတ်</p>
                </a>
            </div>
            <div class="col">
                <i class="fa-solid fa-coins"></i>
                <p style="font-size: 11px;">ဂိမ်းပိုက်ဆံအိတ်</p>
            </div>
            <div class="col">
                <i class="fa-solid fa-pen-to-square"></i>
                <p style="font-size: 11px;">မှတ်တမ်း</p>
            </div>
       </div>
    </div>
    {{-- card 2 --}}
    <div class="card mb-5 child-div">
        <div class="row pt-2 text-center">
            <div class="col">
                <a href="{{ route('user.UserCBPayFillMoney') }}" style="color: black; text-decoration: none;">
                    <i class="fa-solid fa-money-bill-1"></i>
                    <p style="font-size: 11px;">CBPay - ငွေဖြည့်</p>
                </a>
            </div>
            <div class="col">
                <a href="{{ url('/withDraw') }}" style="color: black; text-decoration: none;">
                    <i class="fa-solid fa-money-bill-transfer"></i>
                    <p style="font-size: 11px;">CBPay - ငွေထုတ်</p>
                </a>
            </div>
            <div class="col">
                <i class="fa-solid fa-coins"></i>
                <p style="font-size: 11px;">ဂိမ်းပိုက်ဆံအိတ်</p>
            </div>
            <div class="col">
                <i class="fa-solid fa-pen-to-square"></i>
                <p style="font-size: 11px;">မှတ်တမ်း</p>
            </div>
       </div>
    </div>
    {{-- card 3 --}}
    <div class="card mb-5 child-div">
        <div class="row pt-2 text-center">
            <div class="col">
                <a href="{{ route('user.UserWavePayFillMoney') }}" style="color: black; text-decoration: none;">
                    <i class="fa-solid fa-money-bill-1"></i>
                    <p style="font-size: 11px;">WavePay - ငွေဖြည့်</p>
                </a>
            </div>
            <div class="col">
                <a href="{{ url('/withDraw') }}" style="color: black; text-decoration: none;">
                    <i class="fa-solid fa-money-bill-transfer"></i>
                    <p style="font-size: 11px;">WavePay - ငွေထုတ်</p>
                </a>
            </div>
            <div class="col">
                <i class="fa-solid fa-coins"></i>
                <p style="font-size: 11px;">ဂိမ်းပိုက်ဆံအိတ်</p>
            </div>
            <div class="col">
                <i class="fa-solid fa-pen-to-square"></i>
                <p style="font-size: 11px;">မှတ်တမ်း</p>
            </div>
       </div>
    </div>

    {{-- card 4 --}}
    <div class="card mb-5 child-div">
        <div class="row pt-2 text-center">
            <div class="col">
                <a href="{{ route('user.UserAYAPayFillMoney') }}" style="color: black; text-decoration: none;">
                    <i class="fa-solid fa-money-bill-1"></i>
                    <p style="font-size: 11px;">AYAPay - ငွေဖြည့်</p>
                </a>
            </div>
            <div class="col">
                <a href="{{ url('/withDraw') }}" style="color: black; text-decoration: none;">
                    <i class="fa-solid fa-money-bill-transfer"></i>
                    <p style="font-size: 11px;">AYAPay - ငွေထုတ်</p>
                </a>
            </div>
            <div class="col">
                <i class="fa-solid fa-coins"></i>
                <p style="font-size: 11px;">ဂိမ်းပိုက်ဆံအိတ်</p>
            </div>
            <div class="col">
                <i class="fa-solid fa-pen-to-square"></i>
                <p style="font-size: 11px;">မှတ်တမ်း</p>
            </div>
       </div>
    </div>
    {{-- card end --}}
    <div class="wallet-card" style="padding-bottom: 100px;">
        <h5 class="text-white text-center">ငွေဖြည့်လိုပါက</h5>
        <div class="p-3 text-left text-white">
            <p>၁။ "ငွေဖြည့်" ကို နှိပ်ပါ။</p>
            <p>၂။ KBZ Pay, Wave Pay, CB Pay နှင့် AYA Pay တို့မှ မိမိငွေဖြည့်မည့် ဘဏ်ကို ရွေးပါ။</p>
            <p>၃။ သက်ဆိုင်ရာ Pay ဖြင့် ငွေသွင်းနိုင်သော အကောင့်များ ပေါ်လာပါလိမ့်မည်။</p>
        </div>
    </div>
    <!-- cards section -->
@endsection
