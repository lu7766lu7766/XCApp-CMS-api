<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/10/2
 * Time: 下午 03:26
 */

namespace Modules\WebLink\Http\Requests;

use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Constants\ApiCode\WebLink70000\WebLinkCodeConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class WebLinkListRequest extends BaseFormRequest
{
    /**
     * @return string
     */
    public function getName()
    {
        return $this->get('name');
    }

    /**
     * @return integer
     */
    public function getCategoryId()
    {
        return $this->get('category_id');
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
            'name'        => 'sometimes|required|string',
            'category_id' => 'sometimes|required|integer',
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
            'name.string'         => WebLinkCodeConstants::NAME_MUST_BE_STRING,
            'category_id.integer' => WebLinkCodeConstants::CATEGORY_ID_MUST_BE_INT,
            'page.integer'        => HttpAttributeInvalidCode::PAGE_MUST_BE_INTEGER,
            'perpage.integer'     => HttpAttributeInvalidCode::PERPAGE_MUST_BE_INTEGER,
            'perpage.between'     => HttpAttributeInvalidCode::PERPAGE_SIZE_BETWEEN_1_100,
        ];
    }
}
