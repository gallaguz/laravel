<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->where('id', '!=', Auth::id())->paginate(2);
        return view('admin.users', ['users' => $users]);
    }

    public function toggleAdmin(User $user)
    {
        if ($user->id != Auth::id()) {
            $user->is_admin = !$user->is_admin;
            $user->save();
            return redirect()->back()->with('success', 'Права изменены');
        } else {
            return redirect()->route('admin.updateUser')->with('error', 'Ошибка');
        }

    }
}
