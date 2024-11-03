<?php

namespace App\Http\Controllers;

use App\Http\Validate\Login\ReqPostLogin;
use App\Services\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('login.index');
    }

    public function login(Request $request)
    {
        [$mobile, $password] = $this->parse(new ReqPostLogin());
        // 用户信息验证
        $response = (new User())->checkLogin($mobile, $password);
        if ($response->isSuccess()) {
            $user = $response->getData();
            // 写入session
            $request->session()->put('user_id', $user['id']);
            return view('login.success', ['mobile' => $user['mobile']]);
        } else {
            return view('login.error', ['msg' => $response->getMsg()]);
        }
    }
}
