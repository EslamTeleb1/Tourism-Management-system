<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function store(Request $request)
    {
          $validator = Validator::make($request->all(), [
                'tour_id' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'adults' => 'required',                  
            ]);

     if ($validator->passes()) {


        $adults = $request->adults;
        $totalPrice = Booking::calculatePrice($adults);
        $totalPrice *=$adults;
        $booking = Booking::create([
            'tour_id'=>$request->tour_id,
            'email' => $request->email,
            'name' => $request->name,
            'phone' => $request->phone,
            'adults' => $adults,
            'total_price' => $totalPrice,
        ]);
           return response()->json($booking, 200);
       }
       else  
            {
            return response()->json(['message' => $validator->error], 400);

            }

       
   }

    public function index()
        {
            return Booking::all();
        }

    public function show($id)
        {
            $booking = Booking::find($id);

            if (!$booking) {
                return response()->json(['message' => 'Booking not found'], 404);
            }

            return $booking;
        }

    public function update(Request $request, $id)
    {
        $booking = Booking::find($id);

        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        $adults = $request->adults;
        $totalPrice = Booking::calculatePrice($adults);
        $totalPrice*=$adults;
        $booking->update([
            'tour_id'=>$request->tour_id,
            'email' => $request->email,
            'name' => $request->name,
            'phone' => $request->phone,
            'adults' => $adults,
            'total_price' => $totalPrice,
        ]);

        return response()->json($booking, 200);
   }

    public function destroy($id)
    {
        $booking = Booking::find($id);

        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        $booking->delete();

        return response()->json(null, 204);
    }

    }
