@extends('layouts.user_app')
@section('content')
<div class="row text-white sticky-top p-2" style="background: #1aacac; ">
              <span class="material-icons fa-bold">arrow_back</span>
              <h5 class="mx-auto">Delight 2D | 3D</h5>  
              <span class="material-icons fa-bold">refresh</span>           
            </div>
            <div class="fixed-card">
             <div class="row mt-2" style="color: #1aacac;">
             <div class="col">
              <div class="d-flex">
               <span class="material-icons fa-bold" style="font-size: 40px;">account_balance_wallet</span>
               <p class="mt-2 px-2">လက်ကျန်ငွေ</p>              
              </div>
              <p>0.00 Kyat</p>
             </div>                                   
            </div>
            <div class="card event-card">
              <div class="d-flex p-1 justify-content-around">
               <div>
                <span class="material-icons fa-bold">manage_search</span><p>မှတ်တမ်း</p>
               </div>
               <div>
                <span class="material-icons fa-bold">stars</span><p>ကံထူးရှင်များ</p>
               </div>
               <div>
                <span class="material-icons fa-bold">event_note</span><p>ပိတ်ရက်</p>
               </div>               
              </div>
             </div> 
            </div>
            <div class="row bg-light">
             <div class="mx-auto">
              <h1 class="digit-twod" id="live_2d">07</h1>
              <p style="color: #1aacac;">Updated: <span id="live_updated_time">10-0-2023 4:30:00PM</span></p>                             
             </div>                         
            </div>    
            <div class="container-fluid" id="result"></div>
            
             <div class="row mt-3 fixed-footer">
              <div class="col mx-auto">
               <button type="button" class="btn custom-btn" data-toggle="modal" data-target="#playtwod">ထိုးမည်</a>
              </div>              
             </div>  
             {{-- modal start --}}
             <!-- Modal -->
<div class="modal fade" id="playtwod" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
   <div class="row">
    <div class="col-lg-12">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: #1aacac;" id="exampleModalLongTitle">ထိုးမည့်အချိန် (section) ကိုရွေးပါ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="modal-btn">
        <a href="{{ route('admin.MorningPlayTwoDigit')}}" >12:00 AM</a>
       </div>
       <div class="modal-btn">
        <a href="{{ route('admin.EveningPlayTwoDigit')}}" >04:00 PM</a>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn modal-btn1">Save changes</button>
      </div>
    </div>
    </div>
   </div>
    
  </div>
</div>
             {{-- modal end --}}
    
@endsection
@section('scripts')

<script>
        (function() {
            const fetchData = () => {
                const url = 'https://api.thaistock2d.com/live';

                fetch(url)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        const updatedTime = new Date(data.live.time);
                        const day = updatedTime.getDate().toString().padStart(2, '0');
                        const month = (updatedTime.getMonth() + 1).toString().padStart(2, '0');
                        const year = updatedTime.getFullYear();
                        let hours = updatedTime.getHours();
                        const minutes = updatedTime.getMinutes();
                        const ampm = hours >= 12 ? 'PM' : 'AM';
                        hours = hours % 12;
                        hours = hours ? hours : 12;
                        const updatedTimeFormat = `${day}-${month}-${year} ${hours}:${minutes.toString().padStart(2, '0')}:${updatedTime.getSeconds().toString().padStart(2, '0')}${ampm}`;

                        $("#live_2d").text(data.live.twod);
                        $("#live_updated_time").text(updatedTimeFormat);

                        let newHTML = '';
                        data.result.forEach(r => {
                            newHTML += `
                                <div class="card digit-card mb-1"> 
                                  <p class="text-center">${r.open_time}</p>
                                  <div class="multi-text">                
                                    <div class="">
                                      <p>Set</p>
                                      <p>${r.set}</p>
                                    </div>
                                    <div class="">
                                      <p>Value</p>
                                      <p>${r.value}</p>
                                    </div>
                                    <div class="">
                                      <p>2D</p>
                                      <p>${r.twod}</p>
                                    </div>
                                  </div>             
                              </div>
                            `;
                        });
                        $('#result').html(newHTML);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            };

            setInterval(fetchData, 1000);
        })();


  </script>
@endsection