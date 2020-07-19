<?php

namespace Modules\PushNotification\Http\Requests;

use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Http\Requests\BaseFormRequest;

class PushNotificationListRequest extends BaseFormRequest
{
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
    public function getPerPage()
    {
        return $this->get('perpage') ?? 20;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'page'    => 'sometimes|required|integer',
            'perpage' => 'sometimes|required|integer',
        ];
    }

    public function messages()
    {
        return [
            'page.integer'    => HttpAttributeInvalidCode::PAGE_MUST_BE_INTEGER,
            'perpage.integer' => HttpAttributeInvalidCode::PERPAGE_MUST_BE_INTEGER,
        ];
    }
}
