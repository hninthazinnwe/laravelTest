<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRoleCheckMiddleware
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
        $post_id=Request('id');
        $current_post_user_id=Post::find($post_id)->user_id;
        if(Auth::user()->isAdmin || Auth::user()->isPremium || $current_post_user_id==Auth::user()->id){
            return $next($request);
        }else{
            return back()->with("error", "Your are not premium user or admin!");
        }
    }
}
