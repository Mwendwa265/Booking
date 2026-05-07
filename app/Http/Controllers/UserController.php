<?php   

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
   public function createUser(Request $request){
        $validated = $request->validate([
            'name'=>'required|string' ,
            'email'=>'required|email|unique:users,email',
            'password'=> 'required|max:20|min:4',
            'phone'=>'required|string',
            'role_id'=> 'required|integer|exist:roles,id'    // either admin or user
            
        ]);

         $user = new User();
         $user->name = $validated['name'];
         $user-> email= $validated['email'];
         $user->password = Hash::make('password');
         $user->phone = $validated['phone'];
         $user->role_id = $validated['role_id'];
         
        try{
            $user->save();
            return response()->json($user);
        }
        catch(\Exception $exception){
            return response()->json([
                'error'=>'Failed to save User',
                'message'=>$exception->getMessage()
            ],500);
        }

    }


    public function readAllUsers(){     // get all users
        try{
            $users = User::all();
            return response()->json($users);
        }
        catch(\Exception $exception){
            return response()->json([
                'error'=>'Failed to fetch Users.',
                'message'=>$exception->getMessage()
            ],500);
        }  
    }  

    public function readUser($id){
         try{
            $user =User::findOrfail($id);
            return response()->json($user);
        }
        catch(\Exception $exception){
            return response()->json([
                'error'=>'Failed to fetch User.',
                'message'=>$exception->getMessage()
            ],500);
        }
    }

    public function updateUser(Request $request,$id){
            $validated = $request->validate([
            'name'=>'required|string' ,
            'email'=>'required|email|unique:users,email',
            'password'=> 'required',
            'phone'=>'required|string',
            'role_id'=> 'required'
            // if it fails 422 unprossesable content
        ]);
        try{
             $existingUser=User::findOrfail($id);
             $existingUser->name = $validated['name'];
             $existingUser-> email= $validated['email'];
             $existingUser ->password = Hash::make('password');
             $existingUser->phone = $validated['phone'];
             $existingUser ->role_id = $validated['role_id'];
             $existingUser->save();
            return response()->json($existingUser);
        }
        catch(\Exception $exception){
            return response()->json([
                'error'=>'Failed to update User.',
                'message'=>$exception->getMessage()
            ],500);
         }
    }

    public function deleteUser($id) {
    try{  
         $user = User::findOrFail($id);
         $user->delete();
         return response('User Deleted Successfully');  
      
    }
     catch(\Exception $exception){
            return response()->json([
                'error'=>'Failed to delete User.',
                'message'=>$exception->getMessage()
            ],500);      
    }
  }

}

