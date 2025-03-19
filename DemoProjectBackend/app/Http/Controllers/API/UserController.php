<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // List all users (you may choose to paginate)
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }


    // Edit/update user (here we update additional details)
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate user edit data; note password is optional
        $validated = $request->validate([
            'first_name' => 'sometimes|required|string|max:255',
            'last_name'  => 'sometimes|required|string|max:255',
            'password'   => 'sometimes|nullable|string|min:6',
            'address'    => 'sometimes|nullable|string|max:255',
            'city'       => 'sometimes|nullable|string|max:255',
            'state'      => 'sometimes|nullable|string|max:255',
            'zipcode'    => 'sometimes|nullable|string|max:20',
            'country'    => 'sometimes|nullable|string|max:255',
        ]);

        if (isset($validated['password']) && $validated['password']) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return response()->json([
            'message' => 'User updated successfully',
            'user'    => $user,
        ]);
    }

    // Delete user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }
}