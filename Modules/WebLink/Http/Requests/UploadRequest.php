<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/10/3
 * Time: 下午 02:15
 */

namespace Modules\WebLink\Http\Requests;

use Modules\Base\Constants\ApiCode\WebLink70000\WebLinkCodeConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class UploadRequest extends BaseFormRequest
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
            'upload_file' => 'required|image',
        ];
    }

    /**
     * @inheritdoc
     */
    public function messages()
    {
        return [
            'upload_file.required' => WebLinkCodeConstants::UPLOAD_FILE_REQUIRED,
            'upload_file.image'    => WebLinkCodeConstants::UPLOAD_FILE_NOT_IMAGE,
        ];
    }
}
