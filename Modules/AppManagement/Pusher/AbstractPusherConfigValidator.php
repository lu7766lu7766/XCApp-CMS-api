<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2019/6/20
 * Time: 下午 03:02
 */

namespace Modules\AppManagement\Pusher;

use Modules\AppManagement\Contract\IValidator;
use Modules\Base\Constants\ApiCode\AppManagement30000\AppManagementCodeConstants;
use Modules\Base\Exception\ApiErrorCodeException;

abstract class AbstractPusherConfigValidator implements IValidator
{
    /**
     * @return array
     */
    abstract protected function rules(): array;

    /**
     * @return array
     */
    abstract protected function messages(): array;

    /**
     * @param array $data
     * @return array
     */
    public function valid(array $data)
    {
        $validator = \Validator::make($data, $this->rules(), $this->messages());

        return $validator->valid();
    }

    /**
     * @param array $data
     * @return array
     * @throws ApiErrorCodeException
     */
    public function validator(array $data)
    {
        $validator = \Validator::make($data, $this->rules(), $this->messages());
        if ($validator->fails()) {
            throw new ApiErrorCodeException([AppManagementCodeConstants::PUSHER_CONFIG_IS_REQUIRED]);
        }

        return $validator->valid();
    }
}
