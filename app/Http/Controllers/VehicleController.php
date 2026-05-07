<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function createVehicle(Request $request){
        $validated = $request->validate([
            'user_id'=>'required|integer' ,
            'brand'=>'required|string' ,
            'type'=>'required|string' ,
            'model'=>'required|string' ,
            'price_per_day'=>'required|decimal' ,
            'number_plate'=>'required|string' ,
            'availability_status'=>'required|string' ,
            
        ]);

        $vehicle = new Vehicle();
        $vehicle->user_id = $validated['user_id'];
        $vehicle->brand = $validated['brand'];
        $vehicle->type = $validated['type'];
        $vehicle->model = $validated['model'];
        $vehicle->price_per_day = $validated['price_per_day'];
        $vehicle->number_plate = $validated['number_plate'];
        $vehicle->availability_status = $validated['availability_status'];

        try{
            $vehicle->save();
            return response()->json($vehicle);
        }
        catch(\Exception $exception){
            return response()->json([
                'error'=>'Failed to save vehicle' ,
                'message'=>$exception->getMessage()
            ],500);
        }
    }  

    //   read all vehicles
    public function readAllVehicles(){
         try{
            $vehicles = Vehicle::all();
            return response()->json($vehicles);
        }
        catch(\Exception $exception){
            return response()->json([
                'error'=>'Failed to fetch Vehicles.',
                'message'=>$exception->getMessage()
            ],500);
        }  
     }  


    //read one vehicle
    public function readVehicle($id){
         try{
            $vehicle = Vehicle::findOrfail($id);
            return response()->json($vehicle);
        }
        catch(\Exception $exception){
            return response()->json([
                'error'=>'Failed to fetch Vehicle.',
                'message'=>$exception->getMessage()
            ],500);
        }
    }  

    //    update vehicle id
    public function updateVehicle(Request $request,$id){
        $validated = $request->validate([
            'user_id'=>'required|integer' ,
            'brand'=>'required|string' ,
            'type'=>'required|string' ,
            'model'=>'required|string' ,
            'price_per_day'=>'required|decimal' ,
            'number_plate'=>'required|string' ,
            'availability_status'=>'required|string' ,
        ]);

        try{
            $existingVehicle= Vehicle::findOrfail($id);
            $existingVehicle->user_id = $validated['user_id'];
            $existingVehicle->brand = $validated['brand'];
            $existingVehicle->type = $validated['type'];
            $existingVehicle->model = $validated['model'];
            $existingVehicle->price_per_day = $validated['price_per_day'];
            $existingVehicle->number_plate = $validated['number_plate'];
            $existingVehicle->availability_status = $validated['availability_status'];
            $existingVehicle->save();
            return response()->json($existingVehicle);
        }
        catch(\Exception $exception){
            return response()->json([
                'error'=>'Failed to update Vehicles.',
                'message'=>$exception->getMessage()
            ],500);
         }
     }   

        //  delete vehicle id
    public function deleteVehicle($id) {
    try{  
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();
        return response('Vehicle Deleted Successfully!');  
      
    }
     catch(\Exception $exception){
            return response()->json([
                'error'=>'Failed to delete Vehicle.',
                'message'=>$exception->getMessage()
            ],500);      
    }
 }

}
