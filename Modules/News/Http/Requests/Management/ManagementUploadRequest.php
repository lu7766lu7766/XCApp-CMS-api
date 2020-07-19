<?php

namespace Modules\News\Http\Requests\Management;

use Modules\Base\Constants\ApiCode\News50000\NewsCodeConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class ManagementUploadRequest extends BaseFormRequest
{
    /**
     * @return string
     */
    public function getRequestKeyAttr()
    {
        return 'upload_file';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return ['upload_file' => 'required'];
    }

    public function messages()
    {
        return [
            'upload_file.required' => NewsCodeConstants::UPLOAD_FILE_REQUIRED
        ];
    }
}
