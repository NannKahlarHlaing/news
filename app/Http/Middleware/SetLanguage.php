<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $language = $request->segment(1);

        // Validate if the language is supported or set the default language here
        if(!in_array($language, ['en', 'mm', 'zh'])){
            $language = 'en';

        }elseif ($language === 'en') {
            // If the language is 'en', redirect to the URL without the language segment
            $pathWithoutLanguage = ltrim($request->getPathInfo(), '/' . $language);
            return redirect($pathWithoutLanguage);
        }

        app()->setLocale($language);
        session()->put('locale', $language);

        return $next($request);
    }
}
