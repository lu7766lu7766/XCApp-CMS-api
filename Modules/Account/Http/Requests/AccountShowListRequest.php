<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2018/7/4
 * Time: 下午 01:03
 */

namespace Modules\Account\Http\Requests;

use Modules\Base\Http\Requests\HandleInvalidRequest;

class AccountShowListRequest extends HandleInvalidRequest
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->request['id'] ?? null;
    }

    /**
     * @return string
     */
    public function getAccount()
    {
        return $this->request['account'] ?? null;
    }

    /**
     * @return int|null
     */
    public function getRoleId()
    {
        return $this->request['role_id'] ?? 0;
    }

    /**
     * @return string
     */
    public function getPage()
    {
        return $this->request['page'] ?? 1;
    }

    /**
     * @return string
     */
    public function getPerPage()
    {
        return $this->request['perpage'] ?? 10;
    }

    /**
     * Request args validate rules.
     * @link https://laravel.com/docs/master/validation lookup link and know how to write rule.
     * @return array
     * @see https://laravel.com/docs/master/validation#available-validation-rules checkout this to get more rule keyword info
     */
    protected function rules()
    {
        return [
            'id'      => 'sometimes|nullable|integer',
            'account' => 'sometimes|nullable|string',
            'role_id' => 'sometimes|nullable|integer|min:1',
            'page'    => 'sometimes|nullable|integer',
            'perpage' => 'sometimes|nullable|integer'
        ];
    }

    /**
     * Request args validate msg on fail.
     * @link https://laravel.com/docs/master/validation lookup link and know how to write message.
     * @return array
     * @see https://laravel.com/docs/master/validation#customizing-the-error-messages checkout this to get more message info
     * @see https://laravel.com/docs/master/validation#working-with-error-messages checkout this to get more message info
     */
    protected function messages()
    {
        return [];
    }
}
