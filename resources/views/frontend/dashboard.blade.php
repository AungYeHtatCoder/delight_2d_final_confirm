@extends('user_layouts.master')

@section('profile')
@include('user_layouts.profile3')
@endsection

@section('content')
<a href="{{ route('home') }}" class="card text-decoration-none text-dark shadow border border-1 p-3 my-3">
    <div class="d-flex justify-content-between">
        <div class="d-flex">
            <div class="me-3">
                <i class="fas fa-list-ul twod-list"></i>
            </div>
            <p class="pb-0 mb-0">မနက်ပိုင်းထီထိုးမှတ်တမ်း</p>
        </div>
        <div>
            <i class="fas fa-play"></i>
        </div>
    </div>
</a>
<a href="{{ route('user.UserPlayEveningRecord') }}" class="card text-decoration-none text-dark shadow border border-1 p-3 my-3">
    <div class="d-flex justify-content-between">
        <div class="d-flex">
            <div class="me-3">
                <i class="fas fa-list-ul twod-list"></i>
            </div>
            <p class="pb-0 mb-0">ညနေပိုင်းထီထိုးမှတ်တမ်း</p>
        </div>
        <div>
            <i class="fas fa-play"></i>
        </div>
    </div>
</a>
<a href="{{ route('user.MorningPrizeNo') }}" class="card text-decoration-none text-dark shadow border border-1 p-3 my-3">
    <div class="d-flex justify-content-between">
        <div class="d-flex">
            <div class="me-3">
                <i class="fas fa-calendar-days twod-list text-danger"></i>
            </div>
            <p class="pb-0 mb-0">မနက်ပိုင်းထွက်ဂဏန်းများ</p>
        </div>
        <div>
            <i class="fas fa-play"></i>
        </div>
    </div>
</a>

<a href="{{ route('user.EveningPrizeNo') }}" class="card text-decoration-none text-dark shadow border border-1 p-3 my-3">
    <div class="d-flex justify-content-between">
        <div class="d-flex">
            <div class="me-3">
                <i class="fas fa-calendar-days twod-list text-danger"></i>
            </div>
            <p class="pb-0 mb-0">ညနေပိုင်းထွက်ဂဏန်းများ</p>
        </div>
        <div>
            <i class="fas fa-play"></i>
        </div>
    </div>
</a>

<a href="" class="card text-decoration-none text-dark shadow border border-1 p-3 my-3">
    <div class="d-flex justify-content-between">
        <div class="d-flex">
            <div class="me-3">
                <i class="fas fa-star twod-list text-warning"></i>
            </div>
            <p class="pb-0 mb-0">အမှတ် 0 (ကျပ်)</p>
        </div>
        <!-- <div>
            <i class="fas fa-play"></i>
        </div> -->
    </div>
</a>
<a href="{{ url('/myBank') }}" class="card text-decoration-none text-dark shadow border border-1 p-3 my-3">
    <div class="d-flex justify-content-between">
        <div class="d-flex">
            <div class="me-3">
                <i class="fas fa-wallet twod-list text-success"></i>
            </div>
            <p class="pb-0 mb-0">ဘဏ်အကောင့်များ</p>
        </div>
        <div>
            <i class="fas fa-play"></i>
        </div>
    </div>
</a>
<a href="{{ url('/changePassword') }}" class="card text-decoration-none text-dark shadow border border-1 p-3 my-3">
    <div class="d-flex justify-content-between">
        <div class="d-flex">
            <div class="me-3">
                <i class="fas fa-lock text-success twod-list"></i>
            </div>
            <p class="pb-0 mb-0">လျှို့ဝှက်နံပါတ်ပြောင်းရန်</p>
        </div>
        <div>
            <i class="fas fa-play"></i>
        </div>
    </div>
</a>
<a href="{{ url('/inviteCode') }}" class="card text-decoration-none text-dark shadow border border-1 p-3 my-3">
    <div class="d-flex justify-content-between">
        <div class="d-flex">
            <div class="me-3">
                <i class="fas fa-user-group text-success twod-list"></i>
            </div>
            <p class="pb-0 mb-0">မိတ်ဆက်ကုဒ်</p>
        </div>
        <div>
            <i class="fas fa-play"></i>
        </div>
    </div>
</a>
<a href="{{ url('comment') }}" class="card text-decoration-none text-dark shadow border border-1 p-3 my-3">
    <div class="d-flex justify-content-between">
        <div class="d-flex">
            <div class="me-3">
                <i class="fas fa-comment-dots text-warning twod-list"></i>
            </div>
            <p class="pb-0 mb-0">အကြံပြုရန်</p>
        </div>
        <div>
            <i class="fas fa-play"></i>
        </div>
    </div>
</a>
<a href="" class="card text-decoration-none text-dark shadow border border-1 p-3 my-3">
    <div class="d-flex justify-content-between">
        <div class="d-flex">
            <div class="me-3">
                <i class="fa-brands fa-google-play text-info twod-list"></i>
            </div>
            <p class="pb-0 mb-0">ဗားရှင်း - 1.0.0</p>
        </div>
        <!-- <div>
            <i class="fas fa-play"></i>
        </div> -->
    </div>
</a>
<a href="" class="card text-decoration-none text-dark shadow border border-1 p-3 my-3">
    <div class="d-flex justify-content-between">
        <div class="d-flex">
            <div class="me-3">
                <i class="fas fa-power-off text-danger twod-list"></i>
            </div>
            {{-- <p class="pb-0 mb-0">ထွက်ခွာရန်</p> --}}
            <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="pb-0 mb-0">
                      ထွက်ခွာရန်
                    </button>
                  </form>
        </div>
        <div>
            <i class="fas fa-play"></i>
        </div>
    </div>
</a>
@endsection
