<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/11/12
 * Time: 下午 12:06
 */

namespace Modules\Comment\Http\Requests;

use Modules\Base\Constants\ApiCode\Comment80000\CommentConstants;
use Modules\Base\Http\Requests\BaseFormRequest;
use Modules\MorphCounter\Constants\MorphCounterConstants;

class ThemeReactionRequest extends BaseFormRequest
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
     * 反應種類
     * @return int
     */
    public function getReactionKind()
    {
        return $this->get('reaction_kind') ?? MorphCounterConstants::THUMBS_UP;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'theme_id'      => 'required|string|max:255',
            'reaction_kind' => 'sometimes|required|in:' . MorphCounterConstants::implodeEnum(),
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
            'reaction_kind.in'  => CommentConstants::REACTION_KIND_NOT_SUPPORT,
        ];
    }
}
