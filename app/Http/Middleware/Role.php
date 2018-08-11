<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class role
{
    protected $hierarchy=[
        'admin' => 2, 'client'=> 1
    ];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param $role
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        $user = Auth::user();

        if(!$user || $this->hierarchy[$user->role] < $this->hierarchy[$role]){
            abort(404);
        }

        return $next($request);
    }
}
