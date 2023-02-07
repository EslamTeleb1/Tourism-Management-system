<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $quantity = $request->input('quantity');
        $totalPrice = Booking::calculatePrice($quantity);

        $booking = Booking::create([
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'quantity' => $quantity,
            'total_price' => $totalPrice,
        ]);

        return response()->json($booking, 201);
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

    $quantity = $request->input('quantity');
    $totalPrice = Booking::calculatePrice($quantity);

    $booking->update([
        'email' => $request->input('email'),
        'name' => $request->input('name'),
        'phone' => $request->input('phone'),
        'quantity' => $quantity,
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
