<?php

namespace App\Http\Controllers;

use App\Http\Validate\User\ReqPostExecuteSql;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;

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

    /**
     * @description 分页查询
     */
    public function page()
    {
        // 视图
        return view('user.page');
    }

    /**
     * @description 获取查询结果
     */
    public function pageShow()
    {
        $results = (new User())->getItemPage(5);
        // 将结果返回给视图
        return view('user.page', ['results' => $results]);
    }

    /**
     * @description 导出csv
     * @return void
     */
    public function exportCsv(): void
    {
        $results = (new User())->getItemAll();
        $data = [
            ['ID', '姓名', '手机号']
        ];
        foreach ($results as $value) {
            $data[] = [$value['id'], $value['name'], $value['mobile']];
        }
        // 设置 HTTP 头，告诉浏览器这是一个文件下载
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename="users.csv"');
        // 打开输出流
        $output = fopen('php://output', 'w');
        // 写入数据到 CSV 文件中
        foreach ($data as $row) {
            fputcsv($output, $row);
        }
        // 关闭输出流
        fclose($output);
        exit;
    }

    /**
     * @description 导出json
     * @return void
     */
    public function exportJson(): void
    {
        // 准备数据
        $data = (new User())->getItemAll();
        // 将数据编码为 JSON 格式
        $jsonData = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        // 设置 HTTP 头，使文件下载
        header('Content-Type: application/json');
        header('Content-Disposition: attachment; filename="data.json"');
        // 输出 JSON 数据
        echo $jsonData;
        exit;
    }
}
