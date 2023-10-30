@extends('user_layouts.master')

{{-- @section('profile')
@include('user_layouts.profile3')
@endsection --}}

@section('content')
            <p class="text-center mt-3 text-green">မှတ်တမ်း</p>
            <div class="d-flex justify-content-between">
                <div class="card py-4 w-100 text-center text-green shadow" id="twod">
                    <i class="fas fa-calendar fa-2x mb-3 d-block"></i>
                    <span class="d-block">2D ထီပေါက်စဉ်</span>
                </div>
                <div class="card py-4 w-100 text-center text-green" id="threed">
                    <i class="fas fa-calendar fa-2x mb-3 d-block"></i>
                    <span class="d-block">
                        <a href="{{ route('admin.GetTwoDigit')}}" style="color: #1706da; text-decoration:none">
               <strong>ထီးထိုးရန် နိုပ်ပါ</strong></a>
                    </span>
                </div>
            </div>

                        <div class="twod">
                <div class="card border border-1 p-3 my-3 text-center">
                    @if($prizes->count() > 0)
                    @foreach($prizes as $prize)
                    <div>
                        <p class="btn shadow rounded-lg" style="background-color: #1aacac; color: #fff;">{{ $prize->created_at->format('d M Y (l) (h:i a)') }}</p>
                        <div class="d-flex justify-content-around">
                            <div>
                                {{-- <p class="text-green">Set</p> --}}
                                <p>{{ $prize->prize_no }}</p>
                            </div>
                            <div>
                                {{-- <p class="text-green">Value</p> --}}
                                <p>{{ $prize->session }}</p>
                            </div>
                            <div>
                                <p class="text-green">2D</p>
                                {{-- <p>14</p> --}}
                            </div>
                        </div>
                        <hr>
                    </div>
                    @endforeach
                    @else
                    <div>
                        <p class="text-center text-green">4:30 PM</p>
                        <div class="d-flex justify-content-around">
                            <div>
                                {{-- <p class="text-green">Set</p> --}}
                                <p>No EveningPrizeNo History</p>
                            </div>
                            
                        </div>
                        <hr>
                    </div>
                    @endif

                    

                </div>
                
            </div>

<div class="threed d-none">
    <div class="bg-green p-3 rounded my-3">
        <div class="d-flex justify-content-between">
            <div class="text-center">
                <p class="mb-0 pb-0">Date</p>
                <p class="mb-0 pb-0">16-10-2023</p>
            </div>
            <div>
                <p class="mb-0 pb-0">3D</p>
                <p class="text-warning mb-0 pb-0">445</p>
            </div>
        </div>
    </div>
    <div class="bg-green p-3 rounded my-3">
        <div class="d-flex justify-content-between">
            <div class="text-center">
                <p class="mb-0 pb-0">Date</p>
                <p class="mb-0 pb-0">16-10-2023</p>
            </div>
            <div>
                <p class="mb-0 pb-0">3D</p>
                <p class="text-warning mb-0 pb-0">445</p>
            </div>
        </div>
    </div>
    <div class="bg-green p-3 rounded my-3">
        <div class="d-flex justify-content-between">
            <div class="text-center">
                <p class="mb-0 pb-0">Date</p>
                <p class="mb-0 pb-0">16-10-2023</p>
            </div>
            <div>
                <p class="mb-0 pb-0">3D</p>
                <p class="text-warning mb-0 pb-0">445</p>
            </div>
        </div>
    </div>
    <div class="bg-green p-3 rounded my-3">
        <div class="d-flex justify-content-between">
            <div class="text-center">
                <p class="mb-0 pb-0">Date</p>
                <p class="mb-0 pb-0">16-10-2023</p>
            </div>
            <div>
                <p class="mb-0 pb-0">3D</p>
                <p class="text-warning mb-0 pb-0">445</p>
            </div>
        </div>
    </div>
    <div class="bg-green p-3 rounded my-3">
        <div class="d-flex justify-content-between">
            <div class="text-center">
                <p class="mb-0 pb-0">Date</p>
                <p class="mb-0 pb-0">16-10-2023</p>
            </div>
            <div>
                <p class="mb-0 pb-0">3D</p>
                <p class="text-warning mb-0 pb-0">445</p>
            </div>
        </div>
    </div>
    <div class="bg-green p-3 rounded my-3">
        <div class="d-flex justify-content-between">
            <div class="text-center">
                <p class="mb-0 pb-0">Date</p>
                <p class="mb-0 pb-0">16-10-2023</p>
            </div>
            <div>
                <p class="mb-0 pb-0">3D</p>
                <p class="text-warning mb-0 pb-0">445</p>
            </div>
        </div>
    </div>
    <div class="bg-green p-3 rounded my-3">
        <div class="d-flex justify-content-between">
            <div class="text-center">
                <p class="mb-0 pb-0">Date</p>
                <p class="mb-0 pb-0">16-10-2023</p>
            </div>
            <div>
                <p class="mb-0 pb-0">3D</p>
                <p class="text-warning mb-0 pb-0">445</p>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script>
    $('#twod').click(function(){
        $("#twod").addClass('shadow')
        $("#threed").removeClass('shadow')

        $('.twod').removeClass('d-none');
        $('.threed').addClass('d-none');
    })
    $('#threed').click(function(){
        $("#twod").removeClass('shadow')
        $("#threed").addClass('shadow')


        $('.twod').addClass('d-none');
        $('.threed').removeClass('d-none');
    })
</script>
@endsection
