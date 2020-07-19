<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/6/6
 * Time: 下午 01:16
 */

namespace Modules\IpManagement\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\AppManagement\Constants\MobileDeviceConstants;
use Modules\Base\Constants\ApiCode\IpManagement100000\IpManagementCodeConstants;
use Modules\Base\Constants\CommonStatusConstants;
use Modules\Base\Http\Requests\HandleInvalidRequest;
use Modules\IpManagement\Constants\TypeConstants;

class IpManagementTotalRequest extends HandleInvalidRequest
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
     * @return null|string
     */
    public function getStatus(): ?string
    {
        return $this->request['status'] ?? null;
    }

    /**
     * @return null|string
     */
    public function getKeyword(): ?string
    {
        return $this->request['keyword'] ?? null;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'type'    => 'sometimes|required|' . Rule::in(TypeConstants::enum()),
            'device'  => 'sometimes|required|' . Rule::in(MobileDeviceConstants::enum()),
            'status'  => 'sometimes|required|' . Rule::in(CommonStatusConstants::enum()),
            'keyword' => 'sometimes|required|string',
        ];
    }

    /**
     * @inheritdoc
     */
    public function messages()
    {
        return [
            'type.in'   => IpManagementCodeConstants::TYPE_NOT_SUPPORT,
            'device.in' => IpManagementCodeConstants::DEVICE_NOT_SUPPORT,
            'status.in' => IpManagementCodeConstants::STATUS_NOT_SUPPORT
        ];
    }
}
