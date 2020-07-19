<?php

namespace Modules\News\Http\Requests\Category;

use Modules\Base\Constants\ApiCode\News50000\NewsCodeConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class CategoryUploadImageRequest extends BaseFormRequest
{
    /**
     * @return string
     */
    public function getRequestKeyAttr()
    {
        return 'image';
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'required|image',
        ];
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function messages()
    {
        return [
            'image.image'    => NewsCodeConstants::IMAGE_TYPE_WRONG,
            'image.required' => NewsCodeConstants::IMAGE_REQUIRED
        ];
    }
}
