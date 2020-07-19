<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/22
 * Time: 下午 05:04
 */

namespace Modules\PushNotification\Bridge;

use Modules\Base\Exception\FactoryInstanceErrorException;
use Modules\Base\Support\Traits\Pattern\Singleton;
use Modules\Base\Util\LaravelLoggerUtil;
use Modules\PushNotification\Contract\INotificationApiResponse;
use Modules\PushNotification\Contract\INotificationService;
use Modules\PushNotification\Contract\IPushAble;
use Modules\PushNotification\Factory\PushNotificationCollectorFactory;

class PushBridge
{
    use Singleton;
    /**
     * @var INotificationService|null
     */
    private $pusher = null;
    /**
     * @var IPushAble|null
     */
    private $pushAble = null;

    /**
     * @param INotificationService $pusher
     * @return PushBridge
     */
    public function setPusher(INotificationService $pusher): PushBridge
    {
        $this->pusher = $pusher;

        return $this;
    }

    /**
     * @param IPushAble|null $pushAble
     * @param INotificationService|null $pusher
     * @throws FactoryInstanceErrorException
     */
    protected function init(IPushAble $pushAble = null, INotificationService $pusher = null)
    {
        if (is_null($this->pusher = $pusher) && !is_null($pushAble)) {
            $this->pushAble = $pushAble;
            $this->pusher = PushNotificationCollectorFactory::make(
                $this->pushAble->getPushPath(),
                [$this->pushAble]
            );
        }
    }

    /**
     * @param string|null $message
     * @return INotificationApiResponse|null
     */
    public function push(string $message)
    {
        $response = null;
        if (!is_null($this->pusher)) {
            $response = $this->pusher->publish($message);
            if (!$response->isSuccess()) {
                LaravelLoggerUtil::loggerMessage('id:' . $this->pushAble->getId() .
                    ' Pusher: ' . $response->getPusher() .
                    ' error Msg: ' . $response->getErrorMsg() .
                    ' error Code: ' . $response->getErrorCode());
            }
        }

        return $response;
    }
}
