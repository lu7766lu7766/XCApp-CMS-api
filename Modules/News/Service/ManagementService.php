<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/2
 * Time: 下午 07:45
 */

namespace Modules\News\Service;

use Modules\Base\Constants\ApiCode\CommonCodeConstants;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Base\Support\Traits\Pattern\Singleton;
use Modules\News\Http\Requests\Management\ManagementDeleteRequest;
use Modules\News\Http\Requests\Management\ManagementEditRequest;
use Modules\News\Http\Requests\Management\ManagementListRequest;
use Modules\News\Http\Requests\Management\ManagementStoreRequest;
use Modules\News\Http\Requests\Management\ManagementTotalRequest;
use Modules\News\Http\Requests\Management\ManagementUpdateRequest;
use Modules\News\Repository\ManagementRepository;

class ManagementService
{
    use Singleton;
    /**
     * @var ManagementRepository $rep
     */
    private $rep;

    /**
     * ManagementService constructor.
     */
    public function __construct()
    {
        $this->rep = \App::make(ManagementRepository::class);
    }

    /**
     * @param ManagementListRequest $request
     * @return array
     */
    public function getList(ManagementListRequest $request)
    {
        return $this->rep->getLists(
            $request->getPage(),
            $request->getPerPage(),
            $request->getCategoryId(),
            $request->getSearch()
        )->toArray();
    }

    /**
     * @param ManagementEditRequest $request
     * @return \Modules\News\Entities\NewsManagement
     * @throws ApiErrorCodeException
     */
    public function findFullInfo(ManagementEditRequest $request)
    {
        $item = $this->rep->findFullInfo($request->getId());
        if (is_null($item)) {
            throw new ApiErrorCodeException([CommonCodeConstants::MODEL_NOT_FOUND]);
        }

        return $item;
    }

    /**
     * @param ManagementStoreRequest $request
     * @return \Modules\News\Entities\NewsManagement
     * @throws ApiErrorCodeException
     */
    public function store(ManagementStoreRequest $request)
    {
        $date = [
            'name'         => $request->getName(),
            'category_id'  => $request->getCategoryId(),
            'content'      => $request->getRequestContent(),
            'publish_time' => $request->getPublishTime(),
            'status'       => $request->getStatus(),
            'polling'      => $request->getPolling(),
        ];
        $filesAttr = $request->getCoverImgId() ? [
            $request->getCoverImgId() => [
                'cover' => NYEnumConstants::YES
            ]
        ] : [];
        $item = $this->rep->create(
            $date,
            $request->getTopic(),
            $request->getUploadId(),
            $filesAttr
        );
        if (is_null($item)) {
            throw  new ApiErrorCodeException([CommonCodeConstants::CREATE_FAIL]);
        }

        return $item;
    }

    /**
     * @param ManagementUpdateRequest $request
     * @return \Modules\News\Entities\NewsManagement|null
     * @throws ApiErrorCodeException
     */
    public function update(ManagementUpdateRequest $request)
    {
        $date = [
            'name'         => $request->getName(),
            'category_id'  => $request->getCategoryId(),
            'content'      => $request->getRequestContent(),
            'publish_time' => $request->getPublishTime(),
            'status'       => $request->getStatus(),
            'polling'      => $request->getPolling(),
        ];
        $filesAttr = [];
        foreach ($request->getUploadId() as $uploadId) {
            $filesAttr[$uploadId] = $uploadId == $request->getCoverImgId() ? [
                'cover' => NYEnumConstants::YES
            ] : [
                'cover' => NYEnumConstants::NO
            ];
        }
        $item = $this->rep->update(
            $request->getId(),
            $date,
            $request->getTopic(),
            $request->getUploadId(),
            $filesAttr
        );
        if (is_null($item)) {
            throw  new ApiErrorCodeException([CommonCodeConstants::UPDATE_FAIL]);
        }

        return $item;
    }

    /**
     * @param ManagementDeleteRequest $request
     * @return array
     */
    public function delete(ManagementDeleteRequest $request)
    {
        return ['count' => $this->rep->destroy($request->getIds())];
    }

    /**
     * @param ManagementTotalRequest $request
     * @return array
     */
    public function total(ManagementTotalRequest $request)
    {
        return [
            'total' => $this->rep->total($request->getSearch(), $request->getCategoryId())
        ];
    }
}
