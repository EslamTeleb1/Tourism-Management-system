<?php
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\MessageBag;

 if(!session()->get('locale'))
      {
        $lang="en";
      }
  else {
      $lang =session()->get('locale') ;
      }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Book Tour</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
  </head>
  <style>
       body {background-color: #DDDD;}

    </style>
  <body>
    @include('navbar')
        <div style="margin-top:100px;"></div>
       <div class="container" style="max-width:500px">
         <form method="POST" onsubmit="return false">
           @csrf
                 <div>
                    <label for="tour_id" class="form-label">tour_id</label>
                    <input class="hiden" name="tour_id" value="{{ request()->get('tour_id') }}" disabled>
                 </div>
                   <div class="mb-3">
                    <label for="name" class="form-label">name</label>
                    <input type="text" class="form-control" name="name" >
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">email</label>
                    <input type="text" class="form-control" name="email" >
                </div>
            
                <div class="mb-3">
                    <label for="phone" class="form-label">phone</label>
                    <input type="text" class="form-control" name="phone" >
                </div>
                
                <div class="mb-3">
                    <label for="adults" class="form-label">adults</label>
                    <input type="text" class="form-control" name="adults" >
                </div>
                <button  id="submitBtn" class="btn btn-primary">Book Now</button>
            </form>
         </div>


  </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  <script>
    $('#submitBtn').on('click', ()=> { 

             
      $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),              
            }
        });

        let tour_id = $("input[name=tour_id]").val(); 
        let name = $("input[name=name]").val(); 
        let email = $("input[name=email]").val();     
        let phone = $("input[name=phone]").val();     
        let adults = $("input[name=adults]").val();     
           

          
       $.ajax({
          url: `book_tour`,
          type:"POST",
          //contentType: "application/json",
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          data:{
          _token : $('meta[name="csrf-token"]').attr('content'),

            tour_id,
            name,
            phone,
            email,
            adults
           }
            ,
        success:function(data){

        
                       alert("sucess")
                  },

        error: function ()
           { 
            alert('error');
           }
            
            }); 

 
      })
    </script>
</html>