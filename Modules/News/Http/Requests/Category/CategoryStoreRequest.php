<?php

namespace Modules\News\Http\Requests\Category;

use Illuminate\Validation\Rule;
use Modules\Base\Constants\ApiCode\News50000\NewsCodeConstants;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class CategoryStoreRequest extends BaseFormRequest
{
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
     * @return int|null
     */
    public function getImageId()
    {
        return $this->get('image_id');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'name'     => 'required|string|max:255',
            'image_id' => 'integer|required',
            'status'   => 'required|' . Rule::in(NYEnumConstants::enum())
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'     => NewsCodeConstants::NAME_REQUIRED,
            'name.string'       => NewsCodeConstants::NAME_BE_STRING,
            'name.max'          => NewsCodeConstants::NAME_MAX,
            'status.in'         => NewsCodeConstants::SELECTED_STATUS_IS_INVALID,
            'status.required'   => NewsCodeConstants::STATUS_REQUIRED,
            'image_id.integer'  => NewsCodeConstants::IMAGE_ID_BE_INTEGER,
            'image_id.required' => NewsCodeConstants::IMAGE_ID_REQUIRED,
        ];
    }
}
