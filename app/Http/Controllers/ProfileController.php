<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $user_id = auth()->id();
        $data = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', 'string'],
            'password' => ['nullable', 'confirmed', 'min:8', 'string'],
            'image' => ['mimes:jpeg,jpg,png'],
        ]);

        if ($request->has('password'))
            $data['password'] = Hash::make($request->password);

        if (request()->hasFile('image')) {
            $path = request('image')->store('users', 'public');
            $data['image'] = $path;
        }

        User::findOrFail($user_id)->update($data);

        return back();
    }
}
