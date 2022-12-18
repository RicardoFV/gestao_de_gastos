<?php
namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
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
        $headers = [
            'Access-Control-Allow-Origin'      => '*',
            'Access-Control-Allow-Methods'     => 'HEAD, POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Credentials' => 'true',
            'Access-Control-Max-Age'           => '86400',
            'Access-Control-Allow-Headers'     => 'Range, Content-Type, Api-Token, Key-App, Authorization, X-Requested-With, Accept, Application, X-Custom-Information',
            'Access-Control-Expose-Headers'    => 'Accept-Ranges, Content-Encoding, Content-Length, Content-Range, content-Range',
            'Content-Type'                     => '*'
        ];

        if ($request->isMethod('OPTIONS'))
        {
            return response()->json('{"method":"OPTIONS"}', 200, $headers);
        }

        $response = $next($request);
        foreach($headers as $key => $value)
        {
            $response->headers->set($key, $value);
        }

        return $response;
    }
}
