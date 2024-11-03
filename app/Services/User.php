<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class User extends ServiceBase
{
    /**
     * @description 验证客户登录信息，并返回用户信息
     * @param string $mobile
     * @param string $password
     * @return Struct\IRepServiceArray
     */
    public function checkLogin(string $mobile, string $password): Struct\IRepServiceArray
    {
        // 查询
        $user = (new \App\Models\User())->getItemByMobile($mobile);
        if (!$user) {
            return $this->rArray()->setIsSuccess(false)->setMsg('用户不存在');
        } else if (!password_verify($password, $user['password'])) {
            return $this->rArray()->setIsSuccess(false)->setMsg('密码错误');
        }
        return $this->rArray($user);
    }
}
