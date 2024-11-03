<?php

namespace App\Services\Struct;
use Throwable;

class IRepServiceArray implements RepService
{
    /**
     * @var bool
     */
    protected $isSuccess = false;

    /**
     * @var bool
     */
    protected $hasException = false;

    /**
     * @var string
     */
    protected $msg = '';

    /**
     * @var Throwable
     */
    protected $exception;

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->isSuccess;
    }

    /**
     * @param bool $isSuccess
     * @return IRepServiceArray
     */
    public function setIsSuccess(bool $isSuccess): IRepServiceArray
    {
        $this->isSuccess = $isSuccess;
        return $this;
    }

    /**
     * @return bool
     */
    public function hasException(): bool
    {
        return $this->hasException;
    }

    /**
     * @param bool $hasException
     * @return IRepServiceArray
     */
    public function setHasException(bool $hasException): IRepServiceArray
    {
        $this->hasException = $hasException;
        return $this;
    }

    /**
     * @return string
     */
    public function getMsg(): string
    {
        return $this->msg;
    }

    /**
     * @param string $msg
     * @return IRepServiceArray
     */
    public function setMsg(string $msg): IRepServiceArray
    {
        $this->msg = $msg;
        return $this;
    }

    /**
     * @return Throwable
     */
    public function getException(): Throwable
    {
        return $this->exception;
    }

    /**
     * @param Throwable $exception
     * @return IRepServiceArray
     */
    public function setException(Throwable $exception): IRepServiceArray
    {
        $this->exception = $exception;
        return $this;
    }

    /**
     * @var array
     */
    protected $data;

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     * @return IRepServiceArray
     */
    public function setData(array $data): IRepServiceArray
    {
        $this->data = $data;
        return $this;
    }
}
