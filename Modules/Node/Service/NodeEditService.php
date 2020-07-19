<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2018/7/26
 * Time: 下午 04:18
 */

namespace Modules\Node\Service;

use Modules\Base\Constants\CommonPhraseConstants;
use Modules\Base\Support\Traits\Pattern\Singleton;
use Modules\Node\Assist\Collection\NodeCreateCollection;
use Modules\Node\Entities\Node;
use Modules\Node\Http\Requests\NodeCreateRequest;
use Modules\Node\Repository\NodeEditRepo;
use Modules\Permission\Constants\MethodPermissionConstants;
use Modules\Role\Entities\Role;

class NodeEditService
{
    use Singleton;
    private $repo;

    protected function __construct()
    {
        $this->repo = app(NodeEditRepo::class);
    }

    /**
     * @param Node $node
     * @param string[] $roles
     * @param int $permission
     * @see MethodPermissionConstants to know the permission value.
     */
    public function bindRole(Node $node, array $roles, int $permission)
    {
        $relatedRoleIds = Role::whereIn('code', $roles)->get(['id'])->pluck('id')->all();
        $node->roles()->detach();
        $node->roles()->attach($relatedRoleIds, ['method_permission' => $permission]);
    }

    /**
     * If node exists will be update.
     * @param NodeCreateRequest $request
     * @param array $roles if this be empty will nothing to do, roles value please see RoleInherentConstants
     * @param int $permission default is READ(value = 1)
     * @return Node[] key by node code, when node create fail the value is null.
     * @see \Modules\Role\Constants\RoleInherentConstants to know roles value.
     * @see MethodPermissionConstants to know the permission value.
     */
    public function batchCreateBindRoles(NodeCreateRequest $request, array $roles = [], int $permission = 1)
    {
        $result = [];
        $request->forEach(function (NodeCreateCollection $data) use (&$result, $roles, $permission) {
            $node = $this->findOrNewByCode($data->toArray(), $data->getCode());
            $node->parent_id = $this->findIdByCode($data->getParentCode(''));
            $node->route_uri = $data->getRouteUri(CommonPhraseConstants::NO_FUNCTION . '_' . $data->getCode());
            if ($this->repo->save($node)) {
                $result[$data->getCode()] = $node;
                $this->bindRole($node, $roles, $permission);
            }
        });

        return $result;
    }

    /**
     * @param string $code
     * @return Node|null
     */
    protected function findIdByCode(string $code)
    {
        $result = null;
        $node = $this->repo->findByCode($code);
        if (!is_null($node)) {
            $result = $node->getKey();
        }

        return $result;
    }

    /**
     * @param array $attribute
     * @param string $code
     * @return Node
     */
    protected function findOrNewByCode(array $attribute, string $code)
    {
        Node::reguard();
        $node = $this->repo->findByCode($code) ?? new Node();
        $node->fill($attribute);
        Node::unguard();

        return $node;
    }
}
