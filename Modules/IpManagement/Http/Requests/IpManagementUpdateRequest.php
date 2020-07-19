<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/6/6
 * Time: 下午 01:38
 */

namespace Modules\IpManagement\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\AppManagement\Constants\MobileDeviceConstants;
use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Constants\ApiCode\IpManagement100000\IpManagementCodeConstants;
use Modules\Base\Constants\CommonStatusConstants;
use Modules\Base\Http\Requests\HandleInvalidRequest;
use Modules\IpManagement\Constants\TypeConstants;

class IpManagementUpdateRequest extends HandleInvalidRequest
{
    public function getId(): int
    {
        return $this->request['id'];
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->request['type'];
    }

    /**
     * @return string
     */
    public function getIp(): string
    {
        return $this->request['ip'];
    }

    /**
     * @return string
     */
    public function getDevice(): string
    {
        return $this->request['device'];
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->request['status'];
    }

    public function getRemark(): ?string
    {
        return $this->request['remark'] ?? null;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'id'     => 'required|integer',
            'ip'     => 'required|ip|max:64',
            'type'   => 'required|' . Rule::in(TypeConstants::enum()),
            'device' => 'required|' . Rule::in(MobileDeviceConstants::enum()),
            'status' => 'required|' . Rule::in(CommonStatusConstants::enum()),
            'remark' => 'sometimes|required|string|max:255'
        ];
    }

    /**
     * @inheritdoc
     */
    public function messages()
    {
        return [
            'id.required'     => HttpAttributeInvalidCode::ID_REQUIRED,
            'ip.required'     => IpManagementCodeConstants::IP_REQUIRED,
            'ip.regex'        => IpManagementCodeConstants::IP_FORMAT_ERROR,
            'type.required'   => IpManagementCodeConstants::TYPE_REQUIRED,
            'type.in'         => IpManagementCodeConstants::TYPE_NOT_SUPPORT,
            'device.required' => IpManagementCodeConstants::DEVICE_REQUIRED,
            'device.in'       => IpManagementCodeConstants::DEVICE_NOT_SUPPORT,
            'status.required' => IpManagementCodeConstants::STATUS_REQUIRED,
            'status.in'       => IpManagementCodeConstants::STATUS_NOT_SUPPORT
        ];
    }
}
