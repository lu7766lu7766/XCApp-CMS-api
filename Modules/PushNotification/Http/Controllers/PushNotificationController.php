<?php

namespace Modules\PushNotification\Http\Controllers;

use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Base\Http\Controllers\BaseController;
use Modules\PushNotification\Http\Requests\PushNotificationDeleteRequest;
use Modules\PushNotification\Http\Requests\PushNotificationEditRequest;
use Modules\PushNotification\Http\Requests\PushNotificationIdRequest;
use Modules\PushNotification\Http\Requests\PushNotificationListRequest;
use Modules\PushNotification\Http\Requests\PushNotificationStoreRequest;
use Modules\PushNotification\Http\Requests\PushNotificationUpdateRequest;
use Modules\PushNotification\Service\PushNotificationService;

class PushNotificationController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @param PushNotificationListRequest $request
     * @return array
     */
    public function index(PushNotificationListRequest $request)
    {
        return PushNotificationService::getInstance()->list($request);
    }

    /**
     * Store a newly created resource in storage.
     * @param PushNotificationStoreRequest $request
     * @return array
     * @throws ApiErrorCodeException
     */
    public function store(PushNotificationStoreRequest $request)
    {
        return PushNotificationService::getInstance()->store($request);
    }

    /**
     * @param PushNotificationIdRequest $request
     * @return array
     * @throws ApiErrorCodeException
     */
    public function push(PushNotificationIdRequest $request)
    {
        $result = PushNotificationService::getInstance()->push($request);

        return $result;
    }

    /**
     * @param $id
     * @return array
     * @throws ApiErrorCodeException
     */
    public function edit($id)
    {
        return PushNotificationService::getInstance()->edit(PushNotificationEditRequest::getHandle(['id' => $id]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PushNotificationUpdateRequest $request
     * @return array
     * @throws ApiErrorCodeException
     */
    public function update(PushNotificationUpdateRequest $request)
    {
        return PushNotificationService::getInstance()->update($request);
    }

    /**
     * @param PushNotificationDeleteRequest $request
     * @return array
     */
    public function destroy(PushNotificationDeleteRequest $request)
    {
        return PushNotificationService::getInstance()->delete($request);
    }

    /**
     * 取得總筆數
     * @return array
     */
    public function total()
    {
        return PushNotificationService::getInstance()->total();
    }
}
