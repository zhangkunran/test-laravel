<?php

namespace App\Http\Middleware;

use App\Models\Node;
use App\Models\Role;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class Access
{
    /**
     * 处理传入请求。
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, \Closure $next): Response
    {
        $userId = $request->session()->get('user_id');
        // 当前路由
        $url = $request->path();
        // 权限路由
        $nodeAll = $this->getNodeAll();
        $nodeAllUrl = array_column($nodeAll, 'url');
        if (in_array($url, $nodeAllUrl)) {
            if (!$userId) {
                // 未登录
                return redirect('login');
            } else {
                $currentNodeId = array_column($nodeAll, 'id', 'url')[$url];
                // 查询用户
                $user = (new User())->getItemById($userId);
                if (!$user) {
                    return redirect('login');
                }
                // 查询用户的权限
                $roles = $user['roles_id'] ? (new Role())->getItemNodesIdByIds(explode(',', $user['roles_id'])) : [];
                $userNodesId = [];
                foreach ($roles as $value) {
                    $userNodesId = $value['nodes_id'] ? array_merge(explode(',', $value['nodes_id']), $userNodesId) : $userNodesId;
                }
                $userNodesId = array_unique($userNodesId);
                // 检测访问权限
                if (!in_array($currentNodeId, $userNodesId)) {
                    // 没有权限
                    return redirect('not_permission');
                }
            }
        }
        return $next($request);
    }

    public function getNodeAll()
    {
        return (new Node())->getItemAll();
    }
}
