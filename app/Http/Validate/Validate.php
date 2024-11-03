<?php

namespace App\Http\Validate;

interface Validate
{
    // 规则
    public function rules(): array;
    // 消息
    public function msg(): array;
    // 自定义验证、转换
    public function custom(CustomStruct $customStruct): CustomStruct;
}
