<?php
/**
 * Created by PhpStorm.
 * User: House
 * Date: 2018/11/1
 * Time: 下午 01:38
 */

namespace Modules\Account\Service;

use Modules\Account\Bridge\RoleModelBridge;
use Modules\Account\Contract\IRoleProvider;
use Modules\Account\Entities\Account;
use Modules\Account\Http\Requests\MemberAccountCreateRequest;
use Modules\Account\Repository\AccountEditRepo;
use Modules\Base\Support\Traits\Pattern\Singleton;
use Modules\Role\Constants\RoleInherentConstants;

class MemberAccountService
{
    use Singleton;
    /**
     * @var IRoleProvider
     */
    private $provider;

    protected function init(IRoleProvider $provider = null)
    {
        $this->provider = $provider ?? new RoleModelBridge();
    }

    /**
     * Create a member role account
     * @param MemberAccountCreateRequest $request
     * @return Account|null
     */
    public function create(MemberAccountCreateRequest $request)
    {
        $attribute = [
            'account'      => $request->getAccount(),
            'password'     => \Hash::make($request->getPassword()),
            'display_name' => $request->getDisplayName(),
        ];
        try {
            \DB::transaction(function () use ($attribute, &$result) {
                $result = app(AccountEditRepo::class)->create($attribute);
                $this->attachRole($result, RoleInherentConstants::MEMBER);
            });
        } catch (\Throwable $e) {
        }

        return $result;
    }

    /**
     * @param Account $orm
     * @param string $code
     */
    protected function attachRole(Account $orm, string $code)
    {
        $role = $this->provider->getByCode($code);
        if (!is_null($role)) {
            $orm->roles()->attach($role);
        }
    }
}
