<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/6/6
 * Time: 上午 11:53
 */

namespace Modules\IpManagement\Service;

use Illuminate\Support\Collection;
use Modules\Base\Constants\ApiCode\IpManagement100000\IpManagementCodeConstants;
use Modules\Base\Constants\CommonStatusConstants;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Base\Exception\MariaDBDuplicateEntryException;
use Modules\Base\Support\Traits\Pattern\Singleton;
use Modules\IpManagement\Entities\IpManagement;
use Modules\IpManagement\Http\Requests\IpManagementAddRequest;
use Modules\IpManagement\Http\Requests\IpManagementDataRequest;
use Modules\IpManagement\Http\Requests\IpManagementDelRequest;
use Modules\IpManagement\Http\Requests\IpManagementDetailRequest;
use Modules\IpManagement\Http\Requests\IpManagementListRequest;
use Modules\IpManagement\Http\Requests\IpManagementTotalRequest;
use Modules\IpManagement\Http\Requests\IpManagementUpdateRequest;
use Modules\IpManagement\Repository\IpManagementRepo;

class IpManagementService
{
    use Singleton;

    /**
     * @param IpManagementListRequest $request
     * @return Collection|IpManagement[]
     */
    public function list(IpManagementListRequest $request)
    {
        return app(IpManagementRepo::class)->getList(
            $request->getType(),
            $request->getDevice(),
            $request->getStatus(),
            $request->getKeyword(),
            $request->getPage(),
            $request->getPerpage()
        );
    }

    /**
     * @param IpManagementTotalRequest $request
     * @return int
     */
    public function total(IpManagementTotalRequest $request)
    {
        return app(IpManagementRepo::class)->getTotal(
            $request->getType(),
            $request->getDevice(),
            $request->getStatus(),
            $request->getKeyword()
        );
    }

    /**
     * @param IpManagementDetailRequest $request
     * @return IpManagement|null
     */
    public function detail(IpManagementDetailRequest $request)
    {
        return app(IpManagementRepo::class)->getDetail($request->getId());
    }

    /**
     * @param IpManagementAddRequest $request
     * @return IpManagement
     * @throws ApiErrorCodeException
     */
    public function add(IpManagementAddRequest $request)
    {
        $params = [
            'ip'     => $request->getIp(),
            'type'   => $request->getType(),
            'device' => $request->getDevice(),
            'status' => $request->getStatus(),
            'remark' => $request->getRemark()
        ];
        try {
            $result = app(IpManagementRepo::class)->add($params);
            if (is_null($result)) {
                throw new ApiErrorCodeException([IpManagementCodeConstants::ADD_DATA_FAIL]);
            }
        } catch (MariaDBDuplicateEntryException $e) {
            throw new ApiErrorCodeException([IpManagementCodeConstants::DUPLICATE_DATA]);
        }

        return $result;
    }

    /**
     * @param IpManagementUpdateRequest $request
     * @return IpManagement
     * @throws ApiErrorCodeException
     */
    public function update(IpManagementUpdateRequest $request)
    {
        $params = [
            'ip'     => $request->getIp(),
            'type'   => $request->getType(),
            'device' => $request->getDevice(),
            'status' => $request->getStatus(),
            'remark' => $request->getRemark()
        ];
        try {
            $result = app(IpManagementRepo::class)->update($request->getId(), $params);
            if (is_null($result)) {
                throw new ApiErrorCodeException([IpManagementCodeConstants::UPDATE_DATA_FAIL]);
            }
        } catch (MariaDBDuplicateEntryException $e) {
            throw new ApiErrorCodeException([IpManagementCodeConstants::DUPLICATE_DATA]);
        }

        return $result;
    }

    /**
     * @param IpManagementDelRequest $request
     * @return bool
     */
    public function del(IpManagementDelRequest $request)
    {
        $result = true;
        $count = app(IpManagementRepo::class)->del($request->getId());
        if ($count == 0) {
            $result = false;
        }

        return $result;
    }

    /**
     * @param IpManagementDataRequest $request
     * @return Collection|IpManagement[]
     */
    public function data(IpManagementDataRequest $request)
    {
        return app(IpManagementRepo::class)->getAll(
            $request->getType(),
            $request->getDevice(),
            CommonStatusConstants::ENABLE
        );
    }
}
