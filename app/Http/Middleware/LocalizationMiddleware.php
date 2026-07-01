<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\App;

class LocalizationMiddleware
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
        $local = ($request->hasHeader('X-localization'))
            ? (strlen($request->header('X-localization')) > 0 ? $request->header('X-localization') : 'en')
            : 'en';

        if (in_array($local, ['undefined', 'null'], true) || ! is_dir(base_path('resources/lang/' . $local))) {
            $local = 'en';
        }

        App::setLocale($local);

        return $next($request);
    }
}
