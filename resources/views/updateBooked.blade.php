<?php
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\MessageBag;
use App\Models\Booking;
$BookedTour= Booking::find(request()->get('booked_id'));
//echo $BookedTour;
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>update Booked Tour</title>
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
                    <input class="hidden" name="tour_id" value="{{ request()->get('tour_id') }}" disabled>
                 </div>
                   <div class="mb-3">
                    <label for="name" class="form-label">name</label>
                    <input type="text" class="form-control" value="{{$BookedTour->name}}" name="name" >
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label" >email</label>
                    <input type="text" class="form-control" name="email" value="{{$BookedTour->email}}" >
                </div>
            
                <div class="mb-3">
                    <label for="phone" class="form-label" >phone</label>
                    <input type="text" class="form-control" name="phone" value= "{{$BookedTour->phone}}">
                </div>
                
                <div class="mb-3">
                    <label for="adults" class="form-label"  >adults</label>
                    <input type="text" class="form-control" name="adults" value= "{{$BookedTour->adults}}">
                </div>
                <button  id="submitBtn" onClick="updateTour({{$_GET['booked_id']}})" class="btn btn-primary">Update Booked Tour</button>
            </form>
         </div>

       @if ($message = Session::has('msg'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        @endif


        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

  </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>

  <script>

    const updateTour=(id)=>{


        let tour_id = $("input[name=tour_id]").val(); 
        let name = $("input[name=name]").val(); 
        let email = $("input[name=email]").val();     
        let phone = $("input[name=phone]").val();     
        let adults = $("input[name=adults]").val();     
          
       $.ajax({
          url: `update_booked_tour/${id}`,
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

            alert("sucess");
                  
                  },

        error: function ()
           { 
            alert('error');
           }
            
            }); 

        }

    </script>
</html>