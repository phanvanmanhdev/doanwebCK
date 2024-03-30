<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', ['users' => $users]);
    }
    public function create()
    {
        return view('user.create');
    }
    public function store(Request $request)
    {
        $existingUser = User::where('email', $request->email)->first();
        
        
        if ($existingUser) {
            return redirect()->route('user.create')->with('error', 'Email already exists. Please choose a different email.');
        }

        
        User::create($request->all());

        
        return redirect()->route('user.index')->with('success', 'User added successfully');
    }
    public function edit(string $id)
    {
        $user =User::findOrFail($id);
        return view('user.edit',compact('user'));
    }
    public function update(Request $request, string $id)
    {
        $user =User::findOrFail($id);
        $user ->update($request->all());
        return redirect()->route('user.index')->with('success','user update successfully');
    }
    public function destroy(string $id)
    {
        $product = User::findOrFail($id);
  
        $product->delete();
  
        return redirect()->route('user.index')->with('success', 'user deleted successfully');
    }
}
