<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
         //jika akun yang login sesuai dengan role
            //maka silahkan akses
            //jika tidak sesuai akan diarahkan ke home

        $roles = array_slice(func_get_args(), 2);

        foreach ($roles as $role) {
            $user = Auth::user()->role;
            if( $user == $role){
                return $next($request);
            }
        }
        if ( Auth::user()->role == 'admin') {
            return redirect('/');
        }elseif(Auth::user()->role == 'manager'){
            return redirect('/');
        }
        else {
            return redirect('/transaksi');
        }


    }
}
