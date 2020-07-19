<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/5/14
 * Time: 下午 03:51
 */

namespace Modules\AppAutomation\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\AppAutomation\Constants\StatusConstants;
use Modules\Base\Http\Requests\HandleInvalidRequest;

class AppAutomationListRequest extends HandleInvalidRequest
{
    /**
     * @return null|string
     */
    public function getStatus(): ?string
    {
        return $this->request['status'] ?? null;
    }

    /**
     * @return null|string
     */
    public function getKeyword(): ?string
    {
        return $this->request['keyword'] ?? null;
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->request['page'] ?? 1;
    }

    /**
     * @return int
     */
    public function getPerpage(): int
    {
        return $this->request['perpage'] ?? 20;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'status'  => 'sometimes|required|' . Rule::in(StatusConstants::enum()),
            'keyword' => 'sometimes|required|string',
            'page'    => 'sometimes|required|integer|min:1',
            'perpage' => 'sometimes|required|integer|max:100'
        ];
    }

    /**
     * @inheritdoc
     */
    public function messages()
    {
        return [];
    }
}
