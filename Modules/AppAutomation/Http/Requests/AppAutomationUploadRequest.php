<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/5/15
 * Time: 下午 01:29
 */

namespace Modules\AppAutomation\Http\Requests;

use Modules\Base\Constants\ApiCode\AppAutomation90000\AppAutomationCodeConstants;
use Modules\Base\Http\Requests\HandleInvalidRequest;

class AppAutomationUploadRequest extends HandleInvalidRequest
{
    /**
     * @return string
     */
    public function getUploadFile()
    {
        return 'upload_file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'upload_file' => 'required|mimes:zip',
        ];
    }

    /**
     * @inheritdoc
     */
    public function messages()
    {
        return [
            'upload_file.required' => AppAutomationCodeConstants::UPLOAD_FILE_REQUIRED,
            'upload_file.zip'      => AppAutomationCodeConstants::UPLOAD_FILE_NOT_ZIP,
        ];
    }
}
