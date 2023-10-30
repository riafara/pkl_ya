<?php

namespace App\Http\Controllers;

use App\Models\UserLogs;

class UserLogController extends Controller
{
    public function index()
    {
        $usersLog = UserLogs::all();
        return view('pages.users_log.index', compact('usersLog'));
    }
}
