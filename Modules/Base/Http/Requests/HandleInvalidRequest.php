<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2018/7/4
 * Time: 下午 01:08
 */

namespace Modules\Base\Http\Requests;

use Illuminate\Validation\ValidationException;
use Modules\Base\Exception\ApiErrorCodeException;

abstract class HandleInvalidRequest extends AbstractLaravelRequest
{
    /**
     * @param array $request
     * @return AbstractLaravelRequest|static
     * @throws ApiErrorCodeException
     */
    public static function getHandle(array $request)
    {
        try {
            return $handle = parent::getHandle($request);
        } catch (ValidationException $e) {
            throw new ApiErrorCodeException($e->validator->getMessageBag()->all());
        }
    }
}
