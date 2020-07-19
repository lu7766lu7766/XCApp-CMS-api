<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/10/31
 * Time: 下午 03:16
 */

namespace Modules\Comment\Http\Requests;

use Modules\Base\Constants\ApiCode\Comment80000\CommentConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class AddCommentRequest extends BaseFormRequest
{
    /**
     * 文章主題id
     * @return string
     */
    public function getThemeId()
    {
        return $this->get('theme_id');
    }

    /**
     * 評論訊息
     * @return string
     */
    public function getMessage()
    {
        return $this->get('message');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'theme_id' => 'required|string|max:255',
            'message'  => 'required|string',
        ];
    }

    /**
     * @inheritdoc
     */
    public function messages()
    {
        return [
            'theme_id.required' => CommentConstants::THEME_ID_IS_REQUIRED,
            'theme_id.string'   => CommentConstants::THEME_ID_MUST_BE_STRING,
            'theme_id.max'      => CommentConstants::THEME_ID_LENGTH_MAX_255,
            'message.required'  => CommentConstants::MESSAGE_IS_REQUIRED,
            'message.string'    => CommentConstants::MESSAGE_MUST_BE_STRING,
        ];
    }
}
