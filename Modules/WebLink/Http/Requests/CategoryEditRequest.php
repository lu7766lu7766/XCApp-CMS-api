<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/10/1
 * Time: 下午 03:10
 */

namespace Modules\WebLink\Http\Requests;

use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Constants\ApiCode\WebLink70000\WebLinkCodeConstants;
use Modules\Base\Constants\CommonStatusConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class CategoryEditRequest extends BaseFormRequest
{
    /**
     * @return integer
     */
    public function getId()
    {
        return $this->get('id');
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->get('name');
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->get('status');
    }

    /**
     * @return integer|null
     */
    public function getImageId()
    {
        return $this->get('image_id') ?? null;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'id'       => 'sometimes|required|integer',
            'name'     => 'required|string',
            'status'   => 'required|string|in:' . CommonStatusConstants::implodeEnum(),
            'image_id' => 'sometimes|required|integer',
        ];
    }

    /**
     * @inheritdoc
     */
    public function messages()
    {
        return [
            'id.integer'       => HttpAttributeInvalidCode::ID_BE_INTEGER,
            'name.required'    => WebLinkCodeConstants::NAME_REQUIRED,
            'name.string'      => WebLinkCodeConstants::NAME_MUST_BE_STRING,
            'status.required'  => WebLinkCodeConstants::STATUS_REQUIRED,
            'status.string'    => WebLinkCodeConstants::STATUS_MUST_BE_STRING,
            'status.in'        => WebLinkCodeConstants::STATUS_NOT_SUPPORT,
            'image_id.integer' => WebLinkCodeConstants::IMAGE_ID_MUST_BE_INT,
        ];
    }
}
