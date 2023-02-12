<?php
namespace App\Http\Controllers\Api;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\PayUService\Exception;
use App\Models\Tour;

class TourController extends Controller
{
    public function index()
    {
        return Tour::all();
    }

    public function createTour(Request $request)
    {
        
           $validator = Validator::make($request->all(), [
                'name_ar' => 'required',
                'name_en' => 'required',                
            ]);


         $name = [
            "ar"=>$request->name_ar,
            "en"=>$request->name_en,
          ];

          try{
                $tour =new Tour();
                $tour->name=$name;
                $tour->slug=str_slug($request->name_en, '-');
                $tour->save();
                return response()->json('success', 201);
          }
         catch(\Exception $e) {

                    return $e->getMessage();
                }

       
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
