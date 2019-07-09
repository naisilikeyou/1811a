<?php

namespace App\Http\Middleware;

use Closure;
//use App\Auth\JWTAuth;
use App\Http\Controllers\JWTAuth;
class JWTAuthmiddeware
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
        $token = $request->token;
        if($token){
            $jwt = JWTAuth::getInstance();
            $jwt->SetToken($token);
            if($jwt->validate() && $jwt->verify()){
                return $next($request);
            }else{
                $data=[
                    'code'=>1002,
                    'msg'=>'登录已经失效，请重新登录',
                    'data'=>[],
                ];
                dd(json_encode($data,JSON_UNESCAPED_UNICODE));
            }
        }else{
            $data=[
                'code'=>1001,
                'msg'=>'缺少必要的参数',
                'data'=>[],
            ];
            dd(json_encode($data,JSON_UNESCAPED_UNICODE));
        }

    }
}
