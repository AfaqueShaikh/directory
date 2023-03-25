<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Modules\Store\Models\Store;
use App\Modules\Users\Models\AppUser;

class ApiAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {


        if(!$request->hasHeader("token"))
        {
            $response = [
                'message' => 'Unauthorized',
            ];
            return response()->json($response, 401);
        }

        $store = AppUser::where("api_token", $request->header('token'))->first();


        if (!$store) {
            $response = [
                'message' => 'Unauthorized',
            ];

            return response()->json($response, 401);
        } else {
            return $next($request);
        }
    }
}
