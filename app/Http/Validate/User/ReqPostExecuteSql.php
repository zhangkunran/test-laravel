<?php

namespace App\Http\Validate\User;

use App\Http\Validate\IValidate;
use App\Http\Validate\Validate;

class ReqPostExecuteSql extends IValidate implements Validate
{
    public function rules(): array
    {
        return [
            'sql' => 'required|string'
        ];
    }

    public function msg(): array
    {
        return [
            'sql.*' => '请填写sql',
        ];
    }
}
