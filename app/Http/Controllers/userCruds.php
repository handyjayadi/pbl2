<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class userCruds extends Controller
{
    public function index()
    {
        $users = User::all(); // atau paginate(10)
        return view('admin.userCrud', compact('users'));
    }
    public function store(Request $request) {
    $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:3',
        'role' => 'required'
    ]);

    $validated['password'] = bcrypt($validated['password']);
    User::create($validated);

    return redirect()->route('admin.userManagement')->with('success', 'User ditambahkan.');
}
public function update(Request $request, $id) {
    $user = User::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,'.$id,
        'password' => 'nullable|min:3',
        'role' => 'required'
    ]);

    if ($request->filled('password')) {
        $validated['password'] = bcrypt($request->password);
    } else {
        unset($validated['password']);
    }

    $user->update($validated);

    return redirect()->route('admin.userManagement')->with('success', 'User diperbarui.');
}

public function destroy($id) {
    User::findOrFail($id)->delete();
    return redirect()->route('admin.userManagement')->with('success', 'User dihapus.');
}
}
