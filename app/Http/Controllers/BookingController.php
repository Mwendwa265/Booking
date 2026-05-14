<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function createBooking(Request $request){
        $validated = $request->validate([
            'user_id'=>'required|integer' ,
            'vehicle_id'=>'required|integer' ,
            'start_date'=>'required|date' ,
            'end_date'=>'required|date' ,
            'total_price'=>'required|decimal' ,     
        ]);

        $booking = new Booking();
        $booking->user_id = $validated['user_id'];
        $booking->vehicle_id = $validated['vehicle_id'];
        $booking->start_date = $validated['start_date'];
        $booking->end_date = $validated['end_date'];
        $booking->total_price = $validated['total_price'];
        

        try{
            $booking->save();
            return response()->json($booking);
        }
        catch(\Exception $exception){
            return response()->json([
                'error'=>'Failed to save booking' ,
                'message'=>$exception->getMessage()
            ],500);
        }
    }  

    //   read all bookings
    public function readAllBookings(){
         try{
            $bookings = Booking::all();
            return response()->json($bookings);
        }
        catch(\Exception $exception){
            return response()->json([
                'error'=>'Failed to fetch Bookings.',
                'message'=>$exception->getMessage()
            ],500);
        }  
     }  


    //read one booking
    public function readBooking($id){
         try{
            $booking = Booking::findOrfail($id);
            return response()->json($booking);
        }
        catch(\Exception $exception){
            return response()->json([
                'error'=>'Failed to fetch Booking.',
                'message'=>$exception->getMessage()
            ],500);
        }
    }  

    //    update booking id
    public function updateBooking(Request $request,$id){
        $validated = $request->validate([
            'user_id'=>'required|integer' ,
            'vehicle_id'=>'required|integer' ,
            'start_date'=>'required|date' ,
            'end_date'=>'required|date' ,
            'total_price'=>'required|decimal' ,
            
        ]);

        try{
            $existingBooking= Booking::findOrfail($id);
            $existingBooking->user_id = $validated['user_id'];
            $existingBooking->vehicle_id = $validated['vehicle_id'];
            $existingBooking->start_date = $validated['start_date'];
            $existingBooking->end_date = $validated['end_date'];
            $existingBooking->total_price = $validated['total_price'];
            $existingBooking->save();
            return response()->json($existingBooking);
        }
        catch(\Exception $exception){
            return response()->json([
                'error'=>'Failed to update Bookings.',
                'message'=>$exception->getMessage()
            ],500);
         }
     }   

        //  delete booking id
    public function deleteBooking($id) {
    try{  
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return response('Booking Deleted Successfully!');  
      
    }
     catch(\Exception $exception){
            return response()->json([
                'error'=>'Failed to delete Booking.',
                'message'=>$exception->getMessage()
            ],500);      
    }
 }


}
