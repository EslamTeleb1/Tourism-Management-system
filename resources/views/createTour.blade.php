<?php 

use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\MessageBag;


?>
<!doctype html>
<html lang="ar">
  <head>
    <meta charset="utf-8">
    <!-- <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Create Tour</title>
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
                <div class="mb-3">
                    <label for="tour_name" class="form-label">tourName (ar)</label>
                    <input type="text" class="form-control" name="tour_name_ar" >
                </div>
                 <div class="mb-3">
                    <label for="tour_name" class="form-label">tourName (en)</label>
                    <input type="text" class="form-control" name="tour_name_en" >
                </div>
                <button  id="submitBtn" class="btn btn-primary">Create</button>
            </form>
         </div>


  </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>

  <script>
    $('#submitBtn').on('click', ()=> { 


         let tour_name_ar = $("input[name=tour_name_ar]").val(); 
         let tour_name_en = $("input[name=tour_name_en]").val(); 
            
          
       $.ajax({
          url: `createTour`,
          type:"POST",
         
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
          data:{
          _token : $('meta[name="csrf-token"]').attr('content'),

            name_ar:tour_name_ar,
            name_en:tour_name_en

           }
            ,
              success:function(data){
                
                  alert("sucess")

                  },

        error: function (){ alert('error');}
            
            }); 

 
      })
    </script>
</html>