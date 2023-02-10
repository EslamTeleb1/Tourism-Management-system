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

    public function createTour(Request $request)
    {
        $name = [
            "ar"=>$request->name_ar,
            "en"=>$request->name_en,
          ];
        $tour =new Tour();
        $tour->name=$name;
        $tour->slug=str_slug($request->name_en, '-');
        $tour->save();
        return response()->json('success', 201);
       
    }

    //------------------
    public function show($slug)
     {
        $tourInformation = Tour::all()->where('slug','=',$slug)->first();

        if (!$tourInformation) {
            return response()->json(['message' => 'Tour Information not found'], 404);
        }
         return view('showTour', ['tour' => $tourInformation]);
     }

   public function update(Request $request, $id)
     {
        $tourInformation = Tour::find($id);

        if (!$tourInformation) {
            return response()->json(['message' => 'Tour Information not found'], 404);
        }

        $name = [
            "ar"=>$request->name_ar,
            "en"=>$request->name_en,
          ];

        $tourInformation->name=$name;
        $tourInformation->slug=str_slug($request->name_en, '-');

        $tourInformation->update();

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
