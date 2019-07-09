<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function reg(Request $request)
    {
        $name = $request->name;
        $password = $request->password;
        $password_confirm = $request->password_confirm;
        $email = $request->email;
        echo $name;
        echo $password;
        echo $password_confirm;
        echo $email;exit;
    }
}
