<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/9/14
 * Time: 下午 02:18
 */

namespace Modules\AppManagement\Http\Requests;

use Modules\AppManagement\Constants\StatusConstants;
use Modules\Base\Constants\ApiCode\AppManagement30000\AppManagementCodeConstants;
use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Http\Requests\BaseFormRequest;

class AppManagementListRequest extends BaseFormRequest
{
    /**
     * 行動裝置
     * @return string|null
     */
    public function getMobileDevice()
    {
        return $this->get('mobile_device') ?? null;
    }

    /**
     * 名稱
     * @return string|null
     */
    public function getName()
    {
        return $this->get('name') ?? null;
    }

    /**
     * 類別
     * @return string|null
     */
    public function getCategory()
    {
        return $this->get('category') ?? null;
    }

    /**
     * 狀態
     * @return string
     */
    public function getStatus()
    {
        return $this->get('status') ?? null;
    }

    /**
     * @return integer
     */
    public function getPage()
    {
        return $this->get('page') ?? 1;
    }

    /**
     * @return integer
     */
    public function getPerpage()
    {
        return $this->get('perpage') ?? 20;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'mobile_device' => 'sometimes|required|string',
            'name'          => 'sometimes|required|string',
            'category'      => 'sometimes|required|string',
            'status'        => 'string|in:' . StatusConstants::implodeEnum(),
            'page'          => 'sometimes|required|integer',
            'perpage'       => 'sometimes|required|integer'
        ];
    }

    /**
     * @inheritdoc
     */
    public function messages()
    {
        return [
            'mobile_device.string' => AppManagementCodeConstants::MOBILE_DEVICE_MUST_BE_STRING,
            'name.string'          => AppManagementCodeConstants::NAME_MUST_BE_STRING,
            'category.string'      => AppManagementCodeConstants::CATEGORY_MUST_BE_STRING,
            'status.in'            => AppManagementCodeConstants::STATUS_NOT_SUPPORT,
            'page.integer'         => HttpAttributeInvalidCode::PAGE_MUST_BE_INTEGER,
            'perpage.integer'      => HttpAttributeInvalidCode::PERPAGE_MUST_BE_INTEGER,
        ];
    }
}
