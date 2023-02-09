<?php 

use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\MessageBag;
use App\Models\Tour;
$Tour =Tour::all();
$lang =request()->get('lang');
// echo $Tour;
   ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tours</title>
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
       <div class="" style="padding-left:200px">
         <h2>The Tours</h2>
           <p>numbr of the tours is {{count ($Tour)}} </p>
            <a class="btn bg-light" href="/create_tour">Add a new Tour</a>
        <div class=" formWidth col-sm-4" >
            <table class="table">
                    <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th style="min-width:200px">Slug</th>
                                <th>Delete</th> 
                                <th>Updata<th> 
                                <th style="padding-left:-80px">show Booked tours</th>
                            </tr>
                        </thead >
                <tbody>
                    @foreach($Tour as $tour)
                    <tr id="tour_id_{{$tour->id}}" >
                    <td >{{$tour->id  }}</td>
                    <td >{{$tour->name[$lang]}}</td>
                    <td >{{$tour->slug  }}</td>
                    <td ><button id="del"  onClick="delTour({{ $tour->id  }})" class="btn bg-light"> Delete</button></td>
                    <td ><a id="update" href="/update_tour?tour_id={{ $tour->id}}" class="btn bg-light"> Update</a></td>
                    <td ><a  id="booked_tours" href="/bookings?tour_id={{$tour->id}}&lang={{$lang}}" class="btn bg-light">show</a></td>
                    </tr>
                    @endforeach
                            </tbody>


                            
                        </table>
            
                    </div>

         </div>


  </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>

  <script>

   const delTour =(id)=>{
          
       $.ajax({

          url: `del_tour/${id}`,
          type:"POST",
         
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
          },
          data:{
          _token : $('meta[name="csrf-token"]').attr('content'),
           
           }
            ,
              success:function(data){

                alert("sucess");
                window.location.reload()
   
                  },

        error: function (){ 
            alert('error');}
            
            }); 

          
      
      }

    </script>
</html>