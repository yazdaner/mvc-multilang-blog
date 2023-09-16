<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
       private $locales = ['fa', 'en'];

    public function handle(Request $request, Closure $next, $locale)
    {
        if (array_search($locale, $this->locales) === false) {
            return redirect('/');
        }

        App::setLocale($locale);
        return $next($request);
    }
}
