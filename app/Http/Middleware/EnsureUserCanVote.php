<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserCanVote
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Vote::where('user_id', auth()->id())->whereHas('candidate', function ($query) use ($event){
            $query->where('event_id', $event->id);
        })->exists()) {
            return redirect()->route('dashboard')->with('error', 'Anda sudah memberikan suara pada event ini.');
        }
        return $next($request);
    }
}
