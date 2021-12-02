<?php

namespace App\Http\Controllers\API;

use App\Models\Plant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlantController extends Controller
{
   public function index()
   {

     $plants = Plant::all();

     return response()->json([
         'status' => 200,
         'plants' => $plants,
     ]);

     dd($plants);
   }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'species' => 'required',
            'watering'  => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors' =>$validator->messages(),
            ]);
        }else {
            $plant = new Plant();
            $plant->name = $request->input('name');
            $plant->species = $request->input('species');
            $plant->watering = $request->input('watering');

            if($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('uploads/plant/',$filename);
                $plant->image = 'uploads/plant/'. $filename;
            }
            $plant->save();

            return response()->json([
                'status' => 200,
                'message' => 'Product Added Successfully',
            ]);

        }





    }
}
