<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/9/13
 * Time: 下午 06:03
 */

namespace Modules\PushNotification\Service;

use Carbon\Carbon;
use Modules\Base\Constants\ApiCode\CommonCodeConstants;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Base\Support\Traits\Pattern\Singleton;
use Modules\PushNotification\Bridge\PushBridge;
use Modules\PushNotification\Entities\PushNotification;
use Modules\PushNotification\Http\Requests\PushNotificationDeleteRequest;
use Modules\PushNotification\Http\Requests\PushNotificationEditRequest;
use Modules\PushNotification\Http\Requests\PushNotificationIdRequest;
use Modules\PushNotification\Http\Requests\PushNotificationListRequest;
use Modules\PushNotification\Http\Requests\PushNotificationStoreRequest;
use Modules\PushNotification\Http\Requests\PushNotificationUpdateRequest;
use Modules\PushNotification\Jobs\PushNotificationPresetJob;
use Modules\PushNotification\Repository\PushNotificationRepository;

class PushNotificationService
{
    use Singleton;
    /** @var  PushNotificationRepository $rep */
    private $rep;

    public function __construct()
    {
        $this->rep = \App::make(PushNotificationRepository::class);
    }

    /**
     * @param PushNotificationListRequest $handel
     * @return array
     */
    public function list(PushNotificationListRequest $handel)
    {
        $orderBy = ['id', 'DESC'];

        return $this->rep->getList($handel->getPage(), $handel->getPerPage(), $orderBy)->toArray();
    }

    /**
     * @param PushNotificationStoreRequest $handel
     * @return array
     * @throws ApiErrorCodeException
     */
    public function store(PushNotificationStoreRequest $handel)
    {
        $data = [
            'content' => $handel->getRequestContent()
        ];
        if (!is_null($handel->getScheduleDate())) {
            $data['schedule_time'] = Carbon::parse($handel->getScheduleDate())->timestamp;
        } else {
            $data['schedule_time'] = null;
        }
        try {
            \DB::transaction(function () use ($data, $handel, &$item) {
                $item = $this->rep->create($data, $handel->getTopicIds());
                if (is_null($item)) {
                    throw  new ApiErrorCodeException([CommonCodeConstants::CREATE_FAIL]);
                }
                $id = PushNotificationPresetJob::add($item);
                if (!is_null($id)) {
                    $item->jobs()->sync([$id]);
                }
            });
        } catch (\Throwable $e) {
            throw  new ApiErrorCodeException([CommonCodeConstants::CREATE_FAIL]);
        }

        return $item->toArray();
    }

    /**
     * @param PushNotificationIdRequest $handel
     * @return array
     * @throws ApiErrorCodeException
     */
    public function push(PushNotificationIdRequest $handel)
    {
        $notification = $this->rep->find($handel->getId());
        if (is_null($notification)) {
            throw new ApiErrorCodeException([CommonCodeConstants::MODEL_NOT_FOUND]);
        }
        $this->pushMsg($notification);

        return $notification->toArray();
    }

    /**
     * @param PushNotification $pushNotification
     * @return array
     */
    public function pushMsg(PushNotification $pushNotification)
    {
        $result = [];
        $appManages = $pushNotification->appManagements;
        foreach ($appManages as $appManage) {
            $result[] = PushBridge::getInstance($appManage)->push($pushNotification->content);
        }

        return $result;
    }

    /**
     * @param PushNotificationUpdateRequest $handel
     * @return array
     * @throws ApiErrorCodeException
     */
    public function update(PushNotificationUpdateRequest $handel)
    {
        $data = [
            'content' => $handel->getRequestContent()
        ];
        if (!is_null($handel->getScheduleDate())) {
            $data['schedule_time'] = Carbon::parse($handel->getScheduleDate())->timestamp;
        } else {
            $data['schedule_time'] = null;
        }
        try {
            \DB::transaction(function () use ($data, $handel, &$item) {
                $item = $this->rep->update(
                    $handel->getId(),
                    $data,
                    $handel->getTopicIds()
                );
                if (!$item) {
                    throw  new ApiErrorCodeException([CommonCodeConstants::UPDATE_FAIL]);
                }
                $id = PushNotificationPresetJob::add($item);
                $item->jobs()->delete();
                if (!is_null($id)) {
                    $item->jobs()->sync([$id]);
                }
            });
        } catch (\Throwable $e) {
            throw  new ApiErrorCodeException([CommonCodeConstants::UPDATE_FAIL]);
        }

        return $item->toArray();
    }

    /**
     * @param PushNotificationEditRequest $handel
     * @return array
     * @throws ApiErrorCodeException
     */
    public function edit(PushNotificationEditRequest $handel)
    {
        $item = $this->rep->find($handel->getId());
        if (is_null($item)) {
            throw new ApiErrorCodeException([CommonCodeConstants::MODEL_NOT_FOUND]);
        }

        return $item->toArray();
    }

    /**
     * @param PushNotificationDeleteRequest $handel
     * @return array
     */
    public function delete(PushNotificationDeleteRequest $handel)
    {
        $count = $this->rep->delete($handel->getIds());

        return ['count' => $count];
    }

    /**
     * @return array
     */
    public function total()
    {
        return ['count' => $this->rep->total()->count()];
    }
}
