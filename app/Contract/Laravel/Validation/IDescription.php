<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/5/28
 * Time: 下午 03:53
 */

namespace App\Contract\Laravel\Validation;

interface IDescription
{
    /**
     * 驗證規則
     * @return array
     */
    public function rules(): array;

    /**
     * @return array
     */
    public function messages(): array;
}
