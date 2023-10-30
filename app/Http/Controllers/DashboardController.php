<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $title = 'Home';
        return view('index', compact('user', 'title'));
    }

    public function profile(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $rules = [
                'name' => 'required|string',
            ];
    
            $messages = [
                'name.required' => 'Kolom nama wajib diisi.',
            ];
    
            $this->validate($request, $rules, $messages);

            $user = User::find($id);
            $user->name = $request->input('name');

            if ($user->save()) {
                UserLogs::create([
                    'users' => Auth::user()->nip,
                    'log' => 'Melakukan update profile',
                    'type' => 'activity'
                ]);

                return redirect()->route('profile', $id)
                    ->with('success', 'User information updated successfully');
            } else {
                return redirect()->route('profile', $id)
                    ->with('error', 'User information update failed');
            }
        }

        $user = User::find($id);
        $title = 'Profile';
        return view('profile', compact(['user', 'title']));
    }
}
