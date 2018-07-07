<?php
/**
 * Created by Administrator.
 * Date: 2018/7/7 12:26
 * github: https://github.com/lbmzorx
 */
namespace chat\modules\v1\defination;

/**
 * @SWG\Definition(type="object")
 */
class Response
{
    /**
     * @SWG\Property(format="int32")
     * @var int
     */
    public $code;

    /**
     * @SWG\Property
     * @var string
     */
    public $message;

    /**
     * @SWG\Property(
     *     type="array",
     *     @SWG\Items(
     * )
     * )
     * @var array
     */
    public $result=[];
}