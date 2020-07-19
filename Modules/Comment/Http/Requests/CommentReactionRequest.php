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

class CommentReactionRequest extends BaseFormRequest
{
    /**
     * 評論id
     * @return int
     */
    public function getCommentId()
    {
        return $this->get('comment_id');
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
            'comment_id'    => 'required|integer|exists:comment,id',
            'reaction_kind' => 'sometimes|required|in:' . MorphCounterConstants::implodeEnum(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function messages()
    {
        return [
            'comment_id.required' => CommentConstants::COMMENT_ID_IS_REQUIRED,
            'comment_id.integer'  => CommentConstants::COMMENT_ID_MUST_BE_INTEGER,
            'comment_id.exists'   => CommentConstants::COMMENT_ID_NOT_EXIST,
            'reaction_kind.in'    => CommentConstants::REACTION_KIND_NOT_SUPPORT,
        ];
    }
}
