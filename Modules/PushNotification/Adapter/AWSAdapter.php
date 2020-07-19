<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/17
 * Time: 下午 04:05
 */

namespace Modules\PushNotification\Adapter;

use Aws\Exception\AwsException;
use Aws\Sns\SnsClient;
use Modules\PushNotification\Contract\INotificationApiResponse;
use Modules\PushNotification\Contract\INotificationService;
use Modules\PushNotification\Endpoint\Response\AwsResponse;
use Modules\PushNotification\Endpoint\Response\SummaryResponse;

class AWSAdapter implements INotificationService
{
    /** @var string $topic */
    private $topic;
    /** @var \Aws\AwsClientInterface|SnsClient $sns */
    private $sns;

    /**
     * AWSAdapter constructor.
     * @param string $topicArn
     */
    public function __construct(string $topicArn)
    {
        $this->topic = $topicArn;
        $this->sns = \AWS::createClient('sns');
    }

    /**
     * @param string $message
     * @return INotificationApiResponse
     */
    public function publish(string $message): INotificationApiResponse
    {
        try {
            $result = $this->sns->publish([
                'Message'  => $message,
                'TopicArn' => $this->topic,
            ]);
            $response = new AwsResponse($result);
        } catch (AwsException  $exception) {
            $response = new SummaryResponse(
                'aws',
                $exception->getAwsErrorMessage()
            );
            $response->setSuccess(false)
                ->setErrorCode($exception->getAwsErrorCode())
                ->setStatusCode($exception->getStatusCode());
        }

        return $response;
    }
}
