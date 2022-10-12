<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// here is the code for settling login,register,logout function
class UserController extends Controller
{   
    public function __contruct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('pages.UpdateUser');
    }
  /*  public function update(){
        $r=request();
        $details =User::find($r->id);   
        
        $details->name=$r->userName;
        $details->desciption=$r->userDescription;
        $details->IC=$r->productPrice;
        $details->quantity=$r->productQuantity;
        $details->CategoryID=$r->CategoryID;
        $details->save();

        Return redirect()->route('showInfo');
    }*/
}