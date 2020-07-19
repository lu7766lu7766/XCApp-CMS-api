<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/10/2
 * Time: 下午 01:32
 */

namespace Modules\WebLink\Http\Requests;

use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Constants\ApiCode\WebLink70000\WebLinkCodeConstants;
use Modules\Base\Constants\CommonStatusConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class WebLinkEditRequest extends BaseFormRequest
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
     * @return integer
     */
    public function getCategoryId()
    {
        return $this->get('category_id');
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->get('url_link');
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->get('status');
    }

    /**
     * @return array
     */
    public function getApp()
    {
        return $this->get('app_id') ?? [];
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
            'id'          => 'sometimes|required|integer',
            'name'        => 'required|string',
            'category_id' => 'required|integer|exists:web_link_category,id',
            'url_link'    => 'required|string|url',
            'status'      => 'required|string|in:' . CommonStatusConstants::implodeEnum(),
            'app_id'      => 'sometimes|required|array',
            'app_id.*'    => 'integer',
            'image_id'    => 'sometimes|required|integer',
        ];
    }

    /**
     * @inheritdoc
     */
    public function messages()
    {
        return [
            'id.integer'           => HttpAttributeInvalidCode::ID_BE_INTEGER,
            'name.required'        => WebLinkCodeConstants::NAME_REQUIRED,
            'name.string'          => WebLinkCodeConstants::NAME_MUST_BE_STRING,
            'category_id.required' => WebLinkCodeConstants::CATEGORY_ID_REQUIRED,
            'category_id.integer'  => WebLinkCodeConstants::CATEGORY_ID_MUST_BE_INT,
            'category_id.exists'   => WebLinkCodeConstants::CATEGORY_NOT_FIND,
            'url_link.required'    => WebLinkCodeConstants::URL_REQUIRED,
            'url_link.string'      => WebLinkCodeConstants::URL_MUST_BE_STRING,
            'url_link.url'         => WebLinkCodeConstants::NOT_A_URL,
            'status.required'      => WebLinkCodeConstants::STATUS_REQUIRED,
            'status.string'        => WebLinkCodeConstants::STATUS_MUST_BE_STRING,
            'status.in'            => WebLinkCodeConstants::STATUS_NOT_SUPPORT,
            'app_id.array'         => WebLinkCodeConstants::APP_ID_MUST_BE_ARRAY,
            'app_id.*.integer'     => WebLinkCodeConstants::APP_ID_VALUE_MUST_BE_INT,
            'image_id.integer'     => WebLinkCodeConstants::IMAGE_ID_MUST_BE_INT,
        ];
    }
}
