<?php

namespace App\Http\Validate;

class CustomStruct
{
    /**
     * @description 通过基本验证的数据
     * @var array
     */
    protected $finishedData = [];

    /**
     * @description 自定义转换是否失败
     * @var bool
     */
    protected $isFailed = false;

    /**
     * @description 自定义转换失败信息
     * @var string
     */
    protected $failedMessage = '参数验证失败';

    /**
     * @description 自定义转换成功后的数据
     * @var array
     */
    protected $data = [];


    /**
     * @return array
     */
    public function getFinishedData(): array
    {
        return $this->finishedData;
    }

    /**
     * @param array $finishedData
     * @return CustomStruct
     */
    public function setFinishedData(array $finishedData): CustomStruct
    {
        $this->finishedData = $finishedData;
        return $this;
    }

    /**
     * @return bool
     */
    public function isFailed(): bool
    {
        return $this->isFailed;
    }

    /**
     * @param bool $isFailed
     * @return CustomStruct
     */
    public function setIsFailed(bool $isFailed): CustomStruct
    {
        $this->isFailed = $isFailed;
        return $this;
    }

    /**
     * @return string
     */
    public function getFailedMessage(): string
    {
        return $this->failedMessage;
    }

    /**
     * @param string $failedMessage
     * @return CustomStruct
     */
    public function setFailedMessage(string $failedMessage): CustomStruct
    {
        $this->failedMessage = $failedMessage;
        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     * @return CustomStruct
     */
    public function setData(array $data): CustomStruct
    {
        $this->data = $data;
        return $this;
    }

}
