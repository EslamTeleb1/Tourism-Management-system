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
     @include('navbar')
    <div style="margin-top:20px;"></div>
       <div class="" style="padding-left:300px">
         <h2>The Tour : {{$tour->name[$lang]}}</h2>
          
        <div class=" formWidth col-sm-4" >
            <table class="table">
                    <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th style="min-width:300px">Description</th>
                                <th>Book</th> 
                            </tr>
                        </thead >
                <tbody>
                 
                    <tr id="tour_id_{{$tour->id}}" >
                    <td >{{$tour->id }}</td>
                    <td >{{$tour->name[$lang]}}</td>
                    <td >Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam optio nisi asperiores perspiciatis doloribus ea eligendi in, exercitationem eum nemo culpa consequ</td>
                    <td ><a id="del" class="btn bg-light" href="/book_tour?tour_id={{$tour->id}}"> Book now</a></td>

                    </tr>
                   
                            </tbody>


                            
                        </table>
            
                    </div>

         </div>


  </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>