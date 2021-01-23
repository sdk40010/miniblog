<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\UpdateRequest;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);

        return view('users.show', ['user' => $user]);
    }

    public function edit()
    {
       $user = Auth::user();

       return view('users.edit', ['user' => $user]);
    }

    public function update(UpdateRequest $request)
    {

        $user = Auth::user();
        $user->update($request->all());
        $user->save();
        return redirect()->back()->with(['message' => '更新しました']);
    }
}
