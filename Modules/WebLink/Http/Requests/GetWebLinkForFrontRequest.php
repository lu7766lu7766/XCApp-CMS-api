<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/11/26
 * Time: 下午 06:19
 */

namespace Modules\WebLink\Http\Requests;

use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Constants\ApiCode\WebLink70000\WebLinkCodeConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class GetWebLinkForFrontRequest extends BaseFormRequest
{
    /**
     * @return int
     */
    public function getCategoryId()
    {
        return $this->get('category_id');
    }

    /**
     * @return int
     */
    public function getAppId()
    {
        return $this->get('app_id');
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
            'category_id' => 'required|integer|exists:web_link_category,id',
            'app_id'      => 'required|integer|exists:app_management,id',
            'page'        => 'sometimes|required|integer',
            'perpage'     => 'sometimes|required|integer|between:1,100'
        ];
    }

    /**
     * @inheritdoc
     */
    public function messages()
    {
        return [
            'category_id.required' => WebLinkCodeConstants::CATEGORY_ID_REQUIRED,
            'category_id.integer'  => WebLinkCodeConstants::CATEGORY_ID_MUST_BE_INT,
            'category_id.exists'   => WebLinkCodeConstants::CATEGORY_NOT_FIND,
            'app_id.required'      => WebLinkCodeConstants::APP_ID_REQUIRED,
            'app_id.integer'       => WebLinkCodeConstants::APP_ID_VALUE_MUST_BE_INT,
            'app_id.exists'        => WebLinkCodeConstants::APP_ID_NOT_EXIST,
            'page.integer'         => HttpAttributeInvalidCode::PAGE_MUST_BE_INTEGER,
            'perpage.integer'      => HttpAttributeInvalidCode::PERPAGE_MUST_BE_INTEGER,
            'perpage.between'      => HttpAttributeInvalidCode::PERPAGE_SIZE_BETWEEN_1_100,
        ];
    }
}
