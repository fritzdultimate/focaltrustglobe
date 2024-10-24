<?php

namespace App\Http\Middleware;

use App\Models\UserWallet;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

;

class Wallet extends Middleware {
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next, ...$guards) {
        if(Auth::user()) {
            $wallets = UserWallet::where('user_id', Auth::id())->get();
            if(!$wallets->count()) {
                return redirect('/user/crypto/wallet');
            }
            return $next($request);
        }
        
        return redirect('/login')->with('login-required', 'You must login to continue');
    }
}
