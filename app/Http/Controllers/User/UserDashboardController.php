<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserDashboardController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function userProfile()
    {
        //get user data user id according
         $admindata=User::where('role_id','2')->first();
    return view('user.userProfile')->with(compact('admindata'));
        
    }
}
