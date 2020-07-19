<?php

namespace Modules\PushNotification\Jobs;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Modules\Jobs\Constants\QueueNameConstants;
use Modules\PushNotification\Entities\PushNotification;
use Modules\PushNotification\Service\PushNotificationService;

/**
 * Class PushNotificationJob
 * @package Modules\PushNotification\Jobs
 */
class PushNotificationPresetJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var PushNotification $id
     */
    protected $pushNotification;

    /**
     * PushNotificationJob constructor.
     * @param PushNotification $pushNotification
     */
    public function __construct(PushNotification $pushNotification)
    {
        $this->pushNotification = $pushNotification;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        PushNotificationService::getInstance()->pushMsg($this->pushNotification);
    }

    /**
     * Add new job to queue
     * @param PushNotification $pushNotification
     * @return int|null the job id.
     */
    public static function add(PushNotification $pushNotification)
    {
        $result = null;
        if (!is_null($pushNotification->schedule_time)) {
            $time = Carbon::createFromTimestamp($pushNotification->schedule_time);
            $job = new self($pushNotification);
            $job->delay($time)
                ->onQueue(QueueNameConstants::PUSH_NOTIFICATION_PRESET);
            $result = app(Dispatcher::class)->dispatch($job);
        }

        return $result;
    }
}
