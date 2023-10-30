<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('user_app/assets/style.css')}}">

    <!-- material icon -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/material-icons@1.13.11/iconfont/material-icons.min.css"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <title>Delight Project</title>
  </head>
  <body>  
    <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4 mx-auto" style="position: relative;">            
            <div class="row text-white sticky-top p-2" style="background: #1aacac; ">
              <span class="material-icons fa-bold"><a href="{{ route('home') }}">arrow_back</a></span>
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
               <p>{{ Auth::user()->balance }} MMK</p>
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
          </div>
        </div>
      </div>

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


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    <script>
      // Define the URL you want to fetch
      const url = 'https://api.thaistock2d.com/live';

      // Make the fetch request
      fetch(url)
          .then(response => {
              if (!response.ok) {
                  throw new Error('Network response was not ok');
              }
              return response.json(); // Parse the response body as JSON
          })
          .then(data => {
              // Handle the data from the response
              console.log(data);
              // live 2d winner for today
              $("#live_2d").text(data.live.twod)

              // updated time format code start
              const updatedTime = new Date(data.live.time);
              const day = updatedTime.getDate().toString().padStart(2, '0');
              const month = (updatedTime.getMonth() + 1).toString().padStart(2, '0'); // Months are 0-based
              const year = updatedTime.getFullYear();
              let hours = updatedTime.getHours();
              const minutes = updatedTime.getMinutes();
              const ampm = hours >= 12 ? 'PM' : 'AM';
              hours = hours % 12;
              hours = hours ? hours : 12; // the hour '0' should be '12'
              updatedTimeFormat = `${day}-${month}-${year} ${hours}:${minutes.toString().padStart(2, '0')}:${updatedTime.getSeconds().toString().padStart(2, '0')}${ampm}`
              $("#live_updated_time").text(updatedTimeFormat)
              // updated time format code end

              // result looping
              let newHTML = ''
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
              })
              $('#result').html(newHTML);
              
          })
          .catch(error => {
              // Handle errors
              console.error('Error:', error);
          });
  </script>
  </body>
</html>
