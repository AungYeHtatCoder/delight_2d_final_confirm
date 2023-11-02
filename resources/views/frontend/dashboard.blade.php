@extends('user_layouts.master')
@section('style')
<style>
    .logout-btn {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px;
    border: 1px solid #e0e0e0;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.logout-btn:hover {
    background-color: #f9f9f9;
    text-decoration: none;
}

.logout-icon {
    font-size: 24px;
    color: #FF0000;
}

.logout-text {
    font-size: 16px;
    font-weight: 500;
    margin-left: 10px;
}

.arrow-icon {
    font-size: 16px;
}

</style>
@endsection
@section('profile')
@include('user_layouts.profile3')
@endsection

@section('content')
<div style="margin-bottom: 100px;">
    <a href="{{ url('/playRecord') }}" class="card text-decoration-none text-dark shadow p-3 my-3">
        <div class="d-flex justify-content-between">
            <div class="d-flex">
                <div class="me-3">
                    <i class="fas fa-list-ul twod-list"></i>
                </div>
                <p class="pb-0 mb-0">ထီထိုးမှတ်တမ်း</p>
            </div>
            <div>
                <i class="fas fa-play"></i>
            </div>
        </div>
    </a>
    <a href="{{ url('/winningRecord') }}" class="card text-decoration-none text-dark shadow p-3 my-3">
        <div class="d-flex justify-content-between">
            <div class="d-flex">
                <div class="me-3">
                    <i class="fas fa-calendar-days twod-list text-danger"></i>
                </div>
                <p class="pb-0 mb-0">ထွက်ဂဏန်းများ</p>
            </div>
            <div>
                <i class="fas fa-play"></i>
            </div>
        </div>
    </a>
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
    <a href="{{ url('/user/change-new-password-form') }}" class="card text-decoration-none text-dark shadow border border-1 p-3 my-3">
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
    <a href="#" class="logout-btn text-decoration-none text-dark shadow my-3">
        <div class="d-flex align-items-center">
            <div class="me-3">
                <i class="fas fa-power-off logout-icon"></i>
            </div>
            <form action="{{ route('logout') }}" method="post" class="d-flex align-items-center">
                @csrf
                <button type="submit" class="border-0 bg-transparent logout-text">
                    အကောင့်မှ ထွက်ခွာရန်
                </button>
            </form>
            &nbsp; &nbsp; <i class="fas fa-chevron-right arrow-icon"></i>
        </div>
    </a>
</div>


@endsection
@include('user_layouts.footer')
