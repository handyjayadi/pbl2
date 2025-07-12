<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class userCruds extends Controller
{
    public function index(Request $request)
    {
        // ✅ Tambahkan filter pencarian
    
         $query = User::query();

    if ($request->filled('search')) {
        $query->where(function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('email', 'like', '%' . $request->search . '%');
        });
    }

    $users = $query->paginate(5)->withQueryString();

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
