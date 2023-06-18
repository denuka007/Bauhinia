<?php

namespace App\Http\Controllers\Adminn;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function users()
    {
        $users = User::all();
        return view('adminn.users.index', compact('users'));
    }

    public function viewuser($id)
    {
        $users = User::find($id);
        return view('adminn.users.view', compact('users'));
    }
}
