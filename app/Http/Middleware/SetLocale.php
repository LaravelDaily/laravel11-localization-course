<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        app()->setLocale($request->segment(1)); // <-- Set the application locale
        Carbon::setLocale($request->segment(1)); // <-- Set the Carbon locale

        URL::defaults(['locale' => $request->segment(1)]); // <-- Set the URL defaults
        // (for named routes we won't have to specify the locale each time!)

        return $next($request);
    }
}
