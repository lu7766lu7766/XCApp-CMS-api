<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2019/6/4
 * Time: 下午 06:01
 */

namespace Modules\PushNotification\Adapter;

use Modules\PushNotification\Contract\INotificationApiResponse;
use Modules\PushNotification\Contract\INotificationService;
use Modules\PushNotification\Contract\IPushAble;
use Modules\PushNotification\Endpoint\Response\UmengResponse;
use Symfony\Component\Process\Process;

class UmengAdapter implements INotificationService
{
    /** @var IPushAble $pushAble */
    private $pushAble;

    /**
     * UmengAdapter constructor.
     * @param IPushAble $pushAble
     */
    public function __construct(IPushAble $pushAble)
    {
        $this->pushAble = $pushAble;
    }

    /**
     * @param string $message
     * @return INotificationApiResponse
     */
    public function publish(string $message): INotificationApiResponse
    {
        $process = new Process('cd ' . base_path() . ' && ./push -appId=' . $this->pushAble->getId()
            . ' -pushMessage="' . $message . '"');
        $process->run();

        return new UmengResponse($process);
    }
}
