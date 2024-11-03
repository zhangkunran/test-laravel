<?php

namespace App\Http\Validate;

class IValidate implements Validate
{
    public function rules(): array
    {
        return [];
    }

    public function msg(): array
    {
        $messages = [];
        foreach ($this->rules() as $field => $item) {
            $messages[$field . '.*'] = '字段[' . $field . ']不合法';
        }
        return $messages;
    }

    public function custom(CustomStruct $customStruct): CustomStruct
    {
        return $customStruct->setIsFailed(false)->setData($customStruct->getFinishedData());
    }

}
