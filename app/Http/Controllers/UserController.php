<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function delete(User $user)
   {
    $user->delete();
    return redirect('/')->with('user','Your account successfully deleted');
   }
}
