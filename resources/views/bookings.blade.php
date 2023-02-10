<?php 

use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\MessageBag;
use App\Models\Booking;

if(request()->get('tour_id'))
  {
     $tour_id =request()->get('tour_id');
     $BookedTours = Booking::all()->where('tour_id','=',$tour_id);

  }
  else 
  {
   $BookedTours =Booking::all();
  }
$lang =request()->get('lang');
   ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
  </head>
  <style>
       body {background-color: #DDDD;}
        table tbody tr {

            border:2px solid black;
            }
            table tbody tr:hover{
            border:5px solid green;
        }
    </style>
  <body>
    <div style="margin-top:20px;"></div>
       <div class="container" style="padding-left:300px">
         <h2>Booked tours</h2>
           <p>numbr of the booked tours is  @if($BookedTours) {{ count($BookedTours) }}@endif </p>
           <a class="btn bg-light" href="/?lang={{$lang}}">Book a Tour</a>
        <div class=" formWidth col-sm-4" >
            <table class="table">
                    <thead>
                            <tr>
                                <th>ID</th>
                                <th>tour_id</th>
                                <th>E-mail</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Adults</th>
                                <th>Total Price</th>
                                <th>delete</th>
                                <th>update</th>
                            </tr>
                        </thead >
                <tbody>
                  @if($BookedTours)
                    @foreach($BookedTours as $booked)
                    <tr id="tour_id_{{ $booked->id}}" >
                        <td scope="row">{{ $booked->id  }}</td>
                        <td >{{ $booked->tour_id  }}</td>
                        <td>{{ $booked->email }}</td>
                        <td>{{ $booked->name}}</td>
                        <td>{{ $booked->phone}}</td>
                        <td>{{ $booked->adults}}</td>
                        <td>{{ $booked->total_price}}</td>
                        <td><button id="del" class="btn" onClick="delbookedTour({{ $booked->id  }})"> Delete</button></td>
                        <td><a id="update" href="/update_booked_tour?tour_id={{ $booked->tour_id }}&booked_id={{$booked->id}}" class="btn"> Update</a></td>

                    </tr>
                     @endforeach
                    @else
                    <p>there is no books for this tour <span>tour id = {{$tour_id}}</span></p>
                  @endif
                            </tbody>


                            
                        </table>
            
                    </div>

         </div>


  </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>

  <script>

   const delbookedTour =(id)=>{
          
       $.ajax({

          url: `del_booked/${id}`,
          type:"POST",
         
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
          },
          data:{
          _token : $('meta[name="csrf-token"]').attr('content'),
           
           }
            ,
              success:function(data){
   
                  },

        error: function (){ alert('error');}
            
            }); 

          
      
      }

    </script>
</html>