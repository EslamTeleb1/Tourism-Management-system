<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tour;

class TourController extends Controller
{
    public function index()
    {
        return Tour::all();
    }

    public function store(Request $request)
    {
        $Tour = Tour::create($request->all());
        return response()->json($Tour, 201);
    }

    //------------------
    public function show($id)
   {
        $tourInformation = Tour::find($id);

        if (!$tourInformation) {
            return response()->json(['message' => 'Tour Information not found'], 404);
        }

        return $tourInformation;
     }

   public function update(Request $request, $id)
     {
        $tourInformation = Tour::find($id);

        if (!$tourInformation) {
            return response()->json(['message' => 'Tour Information not found'], 404);
        }

        $tourInformation->update($request->all());

        return response()->json($tourInformation, 200);
     }

    public function destroy($id)
    {
        $tourInformation = Tour::find($id);

        if (!$tourInformation) {
            return response()->json(['message' => 'Tour Information not found'], 404);
        }

        $tourInformation->delete();

        return response()->json(null, 204);
    }


}
