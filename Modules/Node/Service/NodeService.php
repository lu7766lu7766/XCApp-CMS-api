<?php
/**
 * Created by PhpStorm.
 * User: House
 * Date: 2018/9/18
 * Time: 下午 03:29
 */

namespace Modules\Node\Service;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Contract\IModelRetrieve;
use Modules\Node\Entities\NodeSort;
use Modules\Node\Repository\NodeRepo;
use Modules\Node\Repository\RoleRetrieveRepo;

class NodeService
{
    /**
     * @var IModelRetrieve
     */
    private $retrieve;

    /**
     * NodeService constructor.
     * @param IModelRetrieve|null $retrieve
     */
    public function __construct(IModelRetrieve $retrieve = null)
    {
        if (is_null($retrieve)) {
            $this->retrieve = new RoleRetrieveRepo();
        }
    }

    /**
     * @param int $accountId
     * @return array
     */
    public function nodeMap(int $accountId)
    {
        $repo = new NodeRepo();
        $roles = $this->retrieve->findByClosure(function (Builder $builder) use ($accountId) {
            $builder->whereHas('accounts', function (Builder $builder) use ($accountId) {
                $builder->where('account.id', $accountId);
            })
                ->where('enable', NYEnumConstants::YES);
        });
        $data = $repo->getRoleNodes($roles->pluck('id')->all());

        return $data->all();
    }

    /**
     * @param int $accountId
     * @return NodeSort|null
     */
    public function sortInfo(int $accountId)
    {
        $repo = new NodeRepo();
        $orm = $repo->sortInfo($accountId);

        return $orm;
    }

    /**
     * @param array $sort
     * @param Authenticatable $auth
     * @return NodeSort|null
     */
    public function saveSort(array $sort, Authenticatable $auth)
    {
        $repo = new NodeRepo();
        $accountId = $auth->getAuthIdentifier();
        $attribute = [
            'sort' => $sort,
        ];
        if (!$orm = $repo->find($accountId)) {
            $orm = new NodeSort();
            $orm->account_id = $accountId;
        }
        $orm->fill($attribute);
        $result = $repo->saveSort($orm);

        return $result;
    }
}
