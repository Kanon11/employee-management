<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserUpdatePasswordController extends Controller
{
    public function ChangePassword(Request $request, User $user)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:3', 'confirmed'],
        ]);
        $user->update([
            'password'=>Hash::make($request->password)
        ]);
        return redirect()->route('user.index')->with('message', "User's Password Updated Successfully");
    }
}
