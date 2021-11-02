<?php

namespace App\Http\Middleware;

use App\Models\Admin as ModelsAdmin;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check())
        {
            $userId = Auth::id();
            $admins = ModelsAdmin::all();

            foreach($admins as $admin)
            {
                if($admin->user_id === $userId)
                {
                    return $next($request);
                }
            }
        }

        return redirect(abort(404));
    }
}
