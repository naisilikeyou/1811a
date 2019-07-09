<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\JWTAuth;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        echo 123;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        echo 546;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        echo 789;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        echo 147;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        echo 8520;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function login(Request $request)
    {
        //登录
        $uid = 1;
        $jwt  = JWTAuth::getInstance();
//
        $token = $jwt->setuid(1)->encode()->GetToken();
        $data = [
            'code'=>200,
            'msg'=>"ok",
            'data'=>[
                'token'=>$token,
                'Expiration_in'=>time()+3500
            ],
        ];
        dd(json_encode($data,JSON_UNESCAPED_UNICODE));
//        $jwt->SetToken($token)->decode();
    }

    public function check(Request $request)
    {
//        $token = $request->token;
//        if(!isset($toekn)){
//            $jwt = JWTAuth::getInstance();
////            $re = $jwt->SetToken($token)->decode();
//            $re = $jwt->SetToken($token)->validate();
////            $re = $jwt->SetToken($token)->verify();
//            dd($re);
//        }else{
//            $data=[
//                'code'=>1001,
//                'msg'=>'缺少必要的参数',
//                'data'=>[],
//            ];
//            dd(json_encode($data,JSON_UNESCAPED_UNICODE));
//        }
    echo 123;
    }
}
