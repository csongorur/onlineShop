<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function registration_show() {
        return view('admin.registration');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function registration(Request $request) {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
            'password_again' => 'required'
        ]);

        $user = User::where('username', $request->post('username'))->first();

        if (is_null($user)) {
            $user = User::create([
                'username' => $request->post('username'),
                'password' => Hash::make($request->post('password'))
            ]);

            Auth::login($user);
        }

        return redirect('admin');
    }

    public function login(Request $request) {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', $request->post('username'))->first();

        if (!is_null($user)) {
            if (Hash::check($request->post('password'), $user->password)) {
                Auth::login($user);

                return redirect('admin/dashboard');
            }
        }

        return redirect('admin');
    }

    public function logout() {
        Auth::logout();

        return redirect('admin');
    }
}
