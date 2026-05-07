<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\VehicleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//public routes
Route::post('/register' , [AuthController::class , 'register']);
Route::post('/login' , [AuthController::class, 'login']);




        //   protected routes
Route::middleware('auth:sanctum')->group(function () {

       //roles
Route::post('/saveRoles', [RoleController::class, 'createRole']);
Route::get('/getRoles', [RoleController::class, 'readAllRoles']);
Route::get('/getRole/{id}', [RoleController::class, 'readRole']);
Route::put('/updateRole/{id}', [RoleController::class, 'updateRole']);
Route::delete('/deleteRole/{id}', [RoleController::class, 'deleteRole']);
       //vehicles
Route::post('/saveVehicles' , [VehicleController::class, 'createVehicle']);  
Route::get('/getVehicles' , [VehicleController::class , 'readAllVehicles']);
Route::get('/getVehicle/{id}' , [VehicleController::class, 'readVehicle']);  
Route::put('/updateVehicle/{id}' , [VehicleController::class, 'updateVehicle']); 
Route::delete('/deleteVehicle/{id}' , [VehicleController::class, 'deleteVehicle']);  
       //booking
Route::post('/saveBookings' , [BookingController::class, 'createBooking']);  
Route::get('/getBookings' , [BookingController::class , 'readAllBookings']);
Route::get('/getBooking/{id}' , [BookingController::class, 'readBooking']);  
Route::put('/updateBooking/{id}' , [BookingController::class, 'updateBooking']); 
Route::delete('/deleteBooking/{id}' , [BookingController::class, 'deleteBooking']);
        //reviews
Route::post('/reviews', [ReviewController::class, 'store']);  
});  
           
       
      
