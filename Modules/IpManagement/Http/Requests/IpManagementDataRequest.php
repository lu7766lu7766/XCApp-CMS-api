<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/6/6
 * Time: 上午 11:55
 */

namespace Modules\IpManagement\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\AppManagement\Constants\MobileDeviceConstants;
use Modules\Base\Constants\ApiCode\IpManagement100000\IpManagementCodeConstants;
use Modules\Base\Http\Requests\HandleInvalidRequest;
use Modules\IpManagement\Constants\TypeConstants;

class IpManagementDataRequest extends HandleInvalidRequest
{
    /**
     * @return null|string
     */
    public function getType(): ?string
    {
        return $this->request['type'] ?? null;
    }

    /**
     * @return null|string
     */
    public function getDevice(): ?string
    {
        return $this->request['device'] ?? null;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'type'   => 'sometimes|required|' . Rule::in(TypeConstants::enum()),
            'device' => 'sometimes|required|' . Rule::in(MobileDeviceConstants::enum()),
        ];
    }

    /**
     * @inheritdoc
     */
    public function messages()
    {
        return [
            'type.in'   => IpManagementCodeConstants::TYPE_NOT_SUPPORT,
            'device.in' => IpManagementCodeConstants::DEVICE_NOT_SUPPORT
        ];
    }
}
