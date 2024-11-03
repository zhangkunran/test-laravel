<?php

namespace App\Services;

use App\Services\Struct\IRepServiceArray;

class ServiceBase
{
    /**
     * @var Throwable
     */
    protected $exception;

    public function setException(Throwable $exception): self
    {
        $this->exception = $exception;
        return $this;
    }

    public function rArray(array $data = [], bool $success = true, string $msg = '操作成功'): IRepServiceArray
    {
        $return = (new IRepServiceArray())
            ->setIsSuccess($this->exception ? false : $success)
            ->setHasException((bool)$this->exception)
            ->setMsg($this->exception ? $this->exception->getMessage() : $msg)
            ->setData($data);
        if ($this->exception) {
            $return->setException($this->exception);
        }
        return $return;
    }
}
