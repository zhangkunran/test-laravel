<?php

namespace App\Http\Controllers;

use App\Http\Validate\User\ReqPostExecuteSql;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function notPermission()
    {
        return view('common.not_permission');
    }

    public function dev()
    {
        return view('user.dev');
    }

    public function executeSql(Request $request)
    {
        [$sql] = $this->parse(new ReqPostExecuteSql());
        try {
            // 执行用户输入的 SQL 语句
            $results = DB::select($sql);
        } catch (\Exception $e) {
            // 捕获并显示错误信息
            return back()->withErrors(['error' => $e->getMessage()]);
        }
        // 将结果返回给视图
        return view('user.dev');
    }

    public function page()
    {
        // 视图
        return view('user.page');
    }

    public function pageShow()
    {
        $results = DB::table('user')->paginate(5);
        // 将结果返回给视图
        return view('user.page', ['results' => $results]);
    }
}
