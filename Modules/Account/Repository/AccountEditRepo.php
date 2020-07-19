<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2018/7/4
 * Time: 上午 11:42
 */

namespace Modules\Account\Repository;

use Modules\Account\Entities\Account;

class AccountEditRepo
{
    /**
     * 新增帳號
     * @param array $attribute
     * @return Account|null
     */
    public function create(array $attribute)
    {
        try {
            $orm = new Account();
            $orm->fill($attribute)->save();
        } catch (\Throwable $e) {
            return null;
        }

        return $orm;
    }

    /**
     * 編輯帳號
     * @param array $attribute
     * @param int $id 帳號id
     * @return Account|null
     */
    public function edit(array $attribute, int $id)
    {
        try {
            $orm = Account::find($id);
            if (!is_null($orm)) {
                $orm->fill($attribute)->save();
            }
        } catch (\Throwable $e) {
            return null;
        }

        return $orm;
    }

    /**
     * 編輯帳號並同步角色資訊
     * @param Account $accountORM
     * @param array $attribute
     * @return Account|null
     */
    public function editWithRole(Account $accountORM, array $attribute)
    {
        try {
            $accountORM->fill($attribute)->save();
            $accountORM->roles()->sync($attribute['role_id']);
            $accountORM->load('roles');
        } catch (\Throwable $e) {
            return null;
        }

        return $accountORM;
    }

    /**
     * 軟刪除帳號(只修改狀態不刪資料)
     * @param array $account_id
     * @return int|null
     */
    public function softDeleteAccountByAccountId(array $account_id)
    {
        try {
            $orm = Account::whereIn('id', $account_id)->delete();
        } catch (\Throwable $e) {
            return null;
        }

        return $orm;
    }
}
