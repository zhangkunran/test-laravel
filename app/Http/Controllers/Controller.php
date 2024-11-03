<?php

namespace App\Http\Controllers;

use App\Http\Validate\CustomStruct;
use App\Http\Validate\Validate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Validation\ValidationException;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * 解析数据
     * @param Validate $validate
     * @return array
     * @throws ValidationException
     */
    public function parse(Validate $validate): array
    {
        $finishedData = $this->validate(request(), $validate->rules(), $validate->msg());
        $customData = [];
        foreach ($validate->rules() as $key => $item) {
            if (strpos($key, '.') !== false) {
                continue;
            }
            if (isset($finishedData[$key])) {
                $customData[$key] = $finishedData[$key];
            } else if (strpos($item, 'array') !== false) {
                $customData[$key] = [];
            } else if (strpos($item, 'integer') !== false || strpos($item, 'numeric') !== false) {
                $customData[$key] = 0;
            } else if (strpos($item, 'string') !== false) {
                $customData[$key] = '';
            } else {
                $customData[$key] = null;
            }
        }
        $customResult = $validate->custom((new CustomStruct())->setFinishedData($customData));
        if ($customResult->isFailed()) {
            throw ValidationException::withMessages([$customResult->getFailedMessage()]);
        }
        return array_values($customResult->getData());
    }
}
