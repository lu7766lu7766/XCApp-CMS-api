<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/4/9
 * Time: 下午 03:45
 */

namespace App\SNS;

use App\Contract\ISMSResponse;
use Xc\AwsSns\Response\PublishResponse;

class AmazonSNSResponse implements ISMSResponse
{
    /**@var PublishResponse $response */
    private $response;

    public function __construct(PublishResponse $response)
    {
        $this->response = $response;
    }

    /**
     * @inheritdoc
     */
    public function isSuccess()
    {
        return !$this->response->isErrorOccur();
    }

    /**
     * @inheritdoc
     */
    public function getIdentifier()
    {
        return $this->response->getData()['messageId'] ?? null;
    }
}
