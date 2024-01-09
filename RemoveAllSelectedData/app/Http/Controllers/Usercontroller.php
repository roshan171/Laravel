<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;
use Laravel\Sanctum\HasApiTokens;

class Usercontroller extends Controller
{
    use HasApiTokens;

    public function index(){
        $data['users'] = User::get();
        return view('home',$data);
    }

    public function removeMulti(Request $request){
      $ids= $request->ids;
      User::whereIn('id',explode(",",$ids))->delete();
      return response()->json(['status'=>true,'message'=>"User Successfully Removed.."]);
    }
}
