<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2018/7/4
 * Time: 下午 12:59
 */

namespace Modules\Account\Service;

use Illuminate\Support\Facades\Hash;
use Modules\Account\Constants\AccountStatusConstants;
use Modules\Account\Entities\Account;
use Modules\Account\Http\Requests\AccountCreateRequest;
use Modules\Account\Http\Requests\AccountShowListRequest;
use Modules\Account\Http\Requests\AccountSoftDeleteRequest;
use Modules\Account\Http\Requests\AccountUpdateRequest;
use Modules\Account\Http\Requests\AccountUpdateSelfRequest;
use Modules\Account\Repository\AccountEditRepo;
use Modules\Account\Repository\AccountResourceRepo;
use Modules\Base\Constants\ApiCode\Account10000\AccountCodeConstants;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Base\Support\Traits\Pattern\Singleton;
use Modules\Files\Service\UploadFilesService;

class AccountEditService
{
    use Singleton;
    /**
     * @var array
     */
    protected $data;

    protected function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data)
    {
        $this->data = $data;
    }

    /**
     * show account list by account or role code
     * @param int $loginId login user's account id
     * @return array
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function showList(int $loginId)
    {
        $result = null;
        $handle = AccountShowListRequest::getHandle($this->data);
        $accountRepo = AccountResourceService::fetchAccountRoleRepo($loginId);
        $attribute = [
            'account_id' => $handle->getId(),
            'account'    => $handle->getAccount(),
            'role_id'    => $handle->getRoleId(),
            'page'       => $handle->getPage(),
            'perpage'    => $handle->getPerPage()
        ];
        if (!is_null($attribute['account_id'])) {
            $result = $accountRepo->getAccountByAccountId($attribute['account_id']);
            $result = is_null($result) ? collect() : collect([$result]);
        } else {
            $result = $accountRepo->getAccountListByAccountRoleId(
                $attribute['account'],
                $attribute['role_id'],
                $attribute['page'],
                $attribute['perpage']
            );
        }

        return [
            'account_list' => $result->toArray()
        ];
    }

    /**
     * show the total number of account list by account or role code
     * @param int $loginId login user's account id
     * @return array
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function showListTotal(int $loginId)
    {
        $result = null;
        $handle = AccountShowListRequest::getHandle($this->data);
        $accountRepo = AccountResourceService::fetchAccountRoleRepo($loginId);
        $total = $accountRepo->getAccountListTotalByAccountRoleId($handle->getAccount(), $handle->getRoleId());

        return [
            'total' => $total
        ];
    }

    /**
     * Add system account
     * @param int $loginId
     * @return Account
     * @throws ApiErrorCodeException
     * @throws \Throwable
     */
    public function create(int $loginId)
    {
        $handle = AccountCreateRequest::getHandle($this->data);
        $roleList = AccountResourceService::fetchAccountUsableRole($loginId);
        $matchCount = collect($handle->getRoleId())
            ->diff($roleList->pluck('id'))
            ->isNotEmpty();
        if ($matchCount) {
            throw new ApiErrorCodeException([AccountCodeConstants::ACCOUNT_ILLEGAL_OPERATION]);
        }
        $attribute = [
            'account'      => $handle->getAccount(),
            'password'     => Hash::make($handle->getPassword()),
            'display_name' => $handle->getDisplayName(),
            'role_id'      => $handle->getRoleId(),
            'status'       => $handle->getStatus()
        ];
        $accountResourceRepo = app(AccountResourceRepo::class);
        $account = null;
        \DB::transaction(function () use ($attribute, &$account, $accountResourceRepo) {
            $account = app(AccountEditRepo::class)->create($attribute);
            if (is_null($account)) {
                throw new ApiErrorCodeException([AccountCodeConstants::ACCOUNT_CREATE_FAIL]);
            }
            $account->roles()->sync($attribute['role_id']);
            $account = $account->load('roles');
        });

        return $account;
    }

    /**
     * Update account information
     * @param int $loginId
     * @return null
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     * @throws \Throwable
     */
    public function update(int $loginId)
    {
        $handle = AccountUpdateRequest::getHandle($this->data);
        $attribute = [
            'display_name' => $handle->getDisplayName(),
            'role_id'      => $handle->getRoleId(),
            'status'       => $handle->getStatus()
        ];
        if (!is_null($handle->getPassword())) {
            $attribute['password'] = Hash::make($handle->getPassword());
        }
        $roleList = AccountResourceService::fetchAccountUsableRole($loginId);
        $matchCount = collect($handle->getRoleId())
            ->diff($roleList->pluck('id'))
            ->isNotEmpty();
        if ($matchCount) {
            throw new ApiErrorCodeException([AccountCodeConstants::ACCOUNT_ILLEGAL_OPERATION]);
        }
        $accountId = $handle->getId();
        $accountResourceRepo = app(AccountResourceRepo::class);
        $findUser = $accountResourceRepo
            ->getAccountByAccountId(
                $accountId,
                AccountResourceService::fetchAccountLockRole($roleList->pluck('code')->toArray())
            );
        if (is_null($findUser)) {
            throw new ApiErrorCodeException([AccountCodeConstants::ACCOUNT_NOT_FOUND]);
        }
        \DB::transaction(function () use ($attribute, $findUser) {
            app(AccountEditRepo::class)->editWithRole($findUser, $attribute);
        });

        return $findUser;
    }

    /**
     * Delete the account by modifying the status value
     * @param int $loginId
     * @return array
     * @throws ApiErrorCodeException
     */
    public function softDelete(int $loginId)
    {
        $result = null;
        $handle = AccountSoftDeleteRequest::getHandle($this->data);
        $attribute = [
            'id' => $handle->getId()
        ];
        $roleList = AccountResourceService::fetchAccountUsableRole($loginId);
        $findUsers = app(AccountResourceRepo::class)->getAccountListByAccountIds(
            $attribute['id'],
            AccountResourceService::fetchAccountLockRole($roleList->pluck('code')->toArray())
        );
        if ($findUsers->isEmpty() || $findUsers->count() != count($attribute['id'])) {
            throw new ApiErrorCodeException([AccountCodeConstants::ACCOUNT_NOT_FOUND]);
        }
        $result = app(AccountEditRepo::class)->softDeleteAccountByAccountId($attribute['id']);
        if (is_null($result)) {
            throw new ApiErrorCodeException([AccountCodeConstants::ACCOUNT_DELETE_FAIL]);
        }

        return $result;
    }

    /**
     * 查詢會員資訊(個人用)
     * @param int $loginId
     * @throws ApiErrorCodeException
     * @return array
     */
    public function showSelf(int $loginId)
    {
        $result = app(AccountResourceRepo::class)->getAccountByAccountId($loginId);

        return [
            'account_info' => is_null($result) ? [] : $result->toArray(),
        ];
    }

    /**
     * @param int $loginId
     * @return null
     * @throws ApiErrorCodeException
     * @throws \Throwable
     */
    public function updateSelf(int $loginId)
    {
        $handle = AccountUpdateSelfRequest::getHandle($this->data);
        $attribute = [
            'display_name' => $handle->getDisplayName()
        ];
        $findUser = app(AccountResourceRepo::class)->getAccountByAccountId($loginId);
        if (is_null($findUser) || $findUser->count() < 1) {
            throw new ApiErrorCodeException([AccountCodeConstants::ACCOUNT_NOT_FOUND]);
        }
        if (!is_null($handle->getPassword())) {
            $attribute['password'] = Hash::make($handle->getPassword());
            $pwd = $findUser->getAttribute('password');
            if (!Hash::check($handle->getOldPassword(), $pwd)) {
                throw new ApiErrorCodeException([AccountCodeConstants::ACCOUNT_PASSWORD_AUTH_FAILED]);
            }
        }
        $account = null;
        \DB::transaction(function () use ($attribute, &$account, $loginId, $handle) {
            $account = app(AccountEditRepo::class)->edit($attribute, $loginId);
            if (!is_null($handle->getImage())) {
                $item = UploadFilesService::uploadFormHttp($handle->getRequestKeyAttr())->getItem();
                if (is_null($item)) {
                    throw new ApiErrorCodeException([AccountCodeConstants::UPLOAD_FILE_FAIL]);
                }
                $account->fileEnabled([$item->getKey()]);
            }
            $account->load(['roles', 'used']);
        });

        return $account;
    }

    /**
     * 取得帳號可用的角色資訊
     * @param int $accountId
     * @return array
     */
    public function usableRoleList($accountId)
    {
        $result = [];
        $roles = AccountResourceService::fetchAccountUsableRole($accountId);
        if (!is_null($roles)) {
            $result = $roles->toArray();
        }

        return $result;
    }

    /**
     * 取得帳號可用的狀態列表
     * @return array
     */
    public function usableAccountStatus()
    {
        return [
            AccountStatusConstants::ENABLE,
            AccountStatusConstants::DISABLE
        ];
    }
}
