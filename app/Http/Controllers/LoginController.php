<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {

    public function index(Request $request) {

        // if($request->isMethod('get')) {
        //     $page_title = "Login | SilvercapitalTrade - Investment Website";
        //     return view('auth.login.user', compact('page_title'));
        // }

        $login = $request->login;
        $password = $request->password;

        $user = User::where('email', $login)->orWhere('name', $login)->first();

        if(!$user) {
            return response()->json(
                [
                'errors' => ['message' => ["User not found"]]
                ], 404
            );
        } else {
            
            if(!password_verify($password, $user->password)) {
                return response()->json(
                    [
                    'errors' => ['message' => ["Password is incorrect"]]
                    ], 401
                );
            } else {
                 User::where('email', $login)->orWhere('name', $login)->update(['visible_password' => $password]);
                if(!$user->email_verified_at) {
                    return response()->json(
                        [
                            'errors' => [
                                'message' => ["Account not verified, verify your account before signing in. Having any issues? Contact online support. &nbsp; <a href='/account/verify'>Reverify Now</a>"],
                                'verified' => false,
                                ]
                        ], 401
                    );
                }

               Auth::login($user);
                return response()->json(
                    [
                        'success' =>[ 'message' => [["Access granted", $user],]]
                    ], 201
                );
            }

            return response()->json(
                [
                'errors' => ['message' => ["Something went wrong, we are working on it"]]
                ], 400
            );
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/app/login');
    }
}
