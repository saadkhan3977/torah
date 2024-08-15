<?php
namespace App\Http\Middleware;
use Closure;
use Auth;
class customer
{
    public function handle($request, Closure $next)
    {
        if(Auth::user()->type=='admin'){
            return $next($request);
        } else {
            return redirect()->route('admin.login')->with('error','You need to login before accessing Customer');
        }
    }
    public function terminate($request, $response){
        
    }
}
