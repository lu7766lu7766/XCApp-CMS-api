<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/10/31
 * Time: 下午 06:50
 */

namespace Modules\Comment\Http\Requests;

use Modules\Base\Constants\ApiCode\Comment80000\CommentConstants;
use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Http\Requests\BaseFormRequest;

class GetMessageInfoRequest extends BaseFormRequest
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
     * @return int
     */
    public function getPage()
    {
        return $this->get('page') ?? 1;
    }

    /**
     * @return int
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
            'theme_id' => 'required|string|max:255',
            'page'     => 'sometimes|required|integer',
            'perpage'  => 'sometimes|required|integer|between:1,100'
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
            'page.integer'      => HttpAttributeInvalidCode::PAGE_MUST_BE_INTEGER,
            'perpage.integer'   => HttpAttributeInvalidCode::PERPAGE_MUST_BE_INTEGER,
            'perpage.between'   => HttpAttributeInvalidCode::PERPAGE_BETWEEN_1_100,
        ];
    }
}
