<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        $users = User::all();

        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        $values = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required'
        ]);

        $usr = new User;

        $usr->name = $values['name'];
        $usr->email = $values['email'];
        $usr->password = Hash::make($values['password']);
        $usr->save();

        return redirect()->route('user.index')->with('status', 'Data Berhasil Disimpan');
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $values = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
        ]);

        User::where('id', $user->id)->update([
            'name' => $values['name'],
            'email' => $values['email'],
        ]);

        return redirect()->route('user.index')->with('status', 'Data Berhasil Diubah');
    }

    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect()->route('user.index')->with('status', 'Data Berhasil Dihapus');
    }
}