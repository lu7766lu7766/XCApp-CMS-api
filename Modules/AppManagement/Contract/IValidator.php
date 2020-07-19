<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2019/6/4
 * Time: 下午 04:50
 */

namespace Modules\AppManagement\Contract;

use Modules\Base\Exception\ApiErrorCodeException;

interface IValidator
{
    /*
     * @return array
     */
    public function valid(array $data);

    /**
     * @throws ApiErrorCodeException
     * @return array
     */
    public function validator(array $data);
}
