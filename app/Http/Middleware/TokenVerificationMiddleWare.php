<?php

namespace App\Http\Middleware;

use App\Helper\JWTToken;
use Closure;
use Firebase\JWT\JWK;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenVerificationMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->cookie('token');
        // dd($token);
        $result = JWTToken::VerifyToken($token);
        // dd($result);

        if($result == 'unauthorized') {
            // return response()->json([
            //     'status' => 'failed',
            //     'message' => 'unauthorisedl'
            // ], 401);
            return redirect('/login');
        }else {
            $request->headers->set('mobile', $result->mobile);
            $request->headers->set('id', $result->userId);
            return $next($request);
        }
    }
}
