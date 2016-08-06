<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class TeacherMiddle
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
        if($request->user()->role !== 'teacher')
        {
            $contentMssg    = Auth::user()->username.', Vous ne pouvez pas àccedez à cette opperation entant que élève';
            $reposneClass   = 'ErrorMssgClass';

            return back()->with(['message' => sprintf($contentMssg), 'class' => $reposneClass]);
        }
        
        return $next($request);
    }
}
