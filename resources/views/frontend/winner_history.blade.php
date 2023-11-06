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
            <p>တလအတွင်း 2D ကံထူးရှင်များ</p>
          </div>
          <div class="d-flex mt-1 text-danger" style="justify-content: space-between;">
            <div>
             <p>Updated at: <br><span class="font-weight-bold">
              {{-- today date and time with js --}}
              <script>
                var d = new Date();
                document.write(d.toLocaleString());
              </script>
            </span></p>
            </div>
            <span class="font-weight-bold" style="font-size: 30px;color: #ab0000;">{{ $winners->count() }}
              @if($winners->count() > 1)
              ကံထူးရှင်များ
              @else
              ကံထူးရှင်များ
              @endif
            </span>
          </div>
          <!-- header -->
          <!-- table -->
          <div class="p-3 shadow" style="margin-bottom: 100px;">
             @if($winners->isEmpty())
          <p>No winners found for the past month.</p>
            @else
            <table class="winner-table table table-striped">
              @foreach($winners as $winner)
              <tr>
               {{-- <td class="mt-2">1.</td> --}}
               <td><i class="fa-regular fa-circle-user" style="font-size: 50px;"></i></td>
               <td><span style="font-size: 10px" >{{ $winner->name }}</span> <p style="font-size: 10px" >{{ $winner->phone }}</p></td>
               <td><span>Session</span> <p>{{ ucfirst($winner->session) }}</p></td>
               <td><span>Win-No</span> <p>{{ $winner->prize_no }}</p></td>
               <td><span>ထိုးငွေ</span> <p>{{ $winner->sub_amount }}</p></td>
               <td><span>ထီပေါက်ငွေ</span> <p>{{ $winner->prize_amount }}</p></td>
              </tr>
              @endforeach
              
            </table>
            @endif

          </div>
          <!-- table -->
@endsection

@include('user_layouts.footer')
