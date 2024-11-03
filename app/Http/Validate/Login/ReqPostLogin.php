<?php

namespace App\Http\Validate\Login;

use App\Http\Validate\CustomStruct;
use App\Http\Validate\IValidate;
use App\Http\Validate\Validate;

class ReqPostLogin extends IValidate implements Validate
{
    public function rules(): array
    {
        return [
            'mobile' => 'required|integer',
            'password' => 'required|string|between:5,10',
        ];
    }

    public function msg(): array
    {
        return [
            'mobile.*' => '手机号不合法',
            'password.between' => '密码长度要在5-10之间',
            'password.*' => '密码不合法',
        ];
    }

    public function custom(CustomStruct $customStruct): CustomStruct
    {
        $data = $customStruct->getFinishedData();
        // 验证手机号码
        $isMobile = preg_match('/^1[3-9]\d{9}$/', $data['mobile']);
        if (!$isMobile) {
            return $customStruct->setIsFailed(true)->setFailedMessage('不是有效的手机号，请重新填写');
        }
        return $customStruct->setIsFailed(false)->setData($data);
    }

}
