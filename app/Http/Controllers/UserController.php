<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserLogs;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.users.index', compact('users'));
    }

    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $rules = [
                'name' => 'required|string',
                'nip' => 'required|unique:users',
                'role' => 'required',
                'password' => 'required|min:8|confirmed',
            ];

            $messages = [
                'name.required' => 'Kolom nama wajib diisi.',
                'nip.required' => 'Kolom NIP wajib diisi.',
                'role.required' => 'Kolom role wajib diisi.',
                'nip.unique' => 'NIP ini telah digunakan sebelumnya.',
                'password.required' => 'Kolom kata sandi wajib diisi.',
                'password.min' => 'Kata sandi harus terdiri dari setidaknya 8 karakter.',
            ];

            $this->validate($request, $rules, $messages);
    
            $addUser = User::create([
                'name' => $request->input('name'),
                'nip' => $request->input('nip'),
                'role' => $request->input('role'),
                'password' => bcrypt($request->input('password')),
            ]);

            if ($addUser) {
                UserLogs::create([
                    'users' => Auth::user()->nip,
                    'log' => 'Melakukan penambahan user dengan ID:'. $request->input('nip'),
                    'type' => 'activity'
                ]);
            }

            return redirect()->route('user.index')->with('success', 'Berhasil menambahkan user');
        }

        return view('pages.users.store');
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $rules = [
                'name' => 'required|string',
                'nip' => 'required|unique:users,nip,'.$id,
                'role' => 'required',
            ];
    
            $messages = [
                'name.required' => 'Kolom nama wajib diisi.',
                'nip.required' => 'Kolom NIP wajib diisi.',
                'role.required' => 'Kolom role wajib diisi.',
                'nip.unique' => 'NIP ini telah digunakan sebelumnya.',
            ];
    
            $this->validate($request, $rules, $messages);
    
            $user = User::find($id);
            $user->name = $request->input('name');
            $user->nip = $request->input('nip');
            $user->role = $request->input('role');
    
            if ($user->save()) {
                UserLogs::create([
                    'users' => Auth::user()->nip,
                    'log' => 'Melakukan update user dengan ID:'. $id,
                    'type' => 'activity'
                ]);

                return redirect()->route('user.update', $id)
                    ->with('success', 'User information updated successfully');
            } else {
                return redirect()->route('user.update', $id)
                    ->with('error', 'User information update failed');
            }
        } 
    
        $user = User::find($id);
    
        return view('pages.users.update', compact('user'));
    }    

    public function delete($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();

            UserLogs::create([
                'users' => Auth::user()->nip,
                'log' => 'Melakukan delete user dengan ID:'. $id,
                'type' => 'activity'
            ]);

            return redirect()->route('user.index')
                ->with('success', 'User deleted successfully');
        } else {
            return redirect()->route('user.index')
                ->with('error', 'User not found');
        }
    }
}
