@extends('user_layouts.master')

@section('content')
{{-- <div class="row text-white sticky-top p-2" style="background: #1aacac; ">
    <a href="index.html" style="color: white;"><span class="material-icons">arrow_back</span></a>
    <h5 class="mx-auto">Delight 2D | 3D</h5>
    <span class="material-icons">refresh</span>
  </div> --}}
  <div class="fixed-card">
   <div class="row mt-2" style="color: #1aacac;">
   <div class="col">
    <div class="d-flex">
     <span class="material-icons" style="font-size: 40px;">account_balance_wallet</span>
     <p class="mt-2 px-2">လက်ကျန်ငွေ</p>
    </div>
    <p>0.00 Kyat</p>
   </div>
  </div>
  <div class="card event-card">
    <div class="d-flex p-1 justify-content-around">
     <div>
      <span class="material-icons">manage_search</span><p>မှတ်တမ်း</p>
     </div>
     <div>
      <a href="winner_page.html" style="text-decoration: none;color: #1aacac ;"><span class="material-icons">stars</span><p>ကံထူးရှင်များ</p></a>
     </div>
     <div>
      <span class="material-icons">event_note</span><p>ပိတ်ရက်</p>
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

   <div class="row mt-3 fixed-footer py-3">
    <div class="col mx-auto">
     <button type="button" class="btn custom-btn" data-toggle="modal" data-target="#playtwod">ထိုးမည်</a>
    </div>
   </div>
@endsection

@section('script')
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
