<?php

namespace App\Http\Middleware;
use Closure;
use Auth;
use App;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::user() || Auth::user()->user_type != 2){
            return redirect(App::getLocale().'/adminpanel/login');
        }
        return $next($request);
    }
}
