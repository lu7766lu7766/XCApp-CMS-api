<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/10/2
 * Time: 下午 05:08
 */

namespace Modules\WebLink\Http\Requests;

use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Constants\ApiCode\WebLink70000\WebLinkCodeConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class WebLinkGetIdRequest extends BaseFormRequest
{
    /**
     * @return array
     */
    public function getId()
    {
        return $this->get('id');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'id'   => 'required|array|between:1,100',
            'id.*' => 'integer',
        ];
    }

    /**
     * @inheritdoc
     */
    public function messages()
    {
        return [
            'id.required'  => HttpAttributeInvalidCode::ID_REQUIRED,
            'id.array'     => WebLinkCodeConstants::ID_MUST_BE_ARRAY,
            'id.*.integer' => HttpAttributeInvalidCode::ID_BE_INTEGER,
            'id.between'   => WebLinkCodeConstants::ID_ARRAY_SIZE_BETWEEN_1_100
        ];
    }
}
