<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/9/25
 * Time: 下午 05:09
 */

namespace Modules\AppManagement\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Modules\AppManagement\Factory\PushPath\ConfigValidatorFactory;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Base\Http\Requests\BaseFormRequest;

abstract class AppManagementEditRequest extends BaseFormRequest
{
    /** @var $config array */
    private $config;

    /**
     * @return Validator
     */
    protected function getValidatorInstance()
    {
        $instance = parent::getValidatorInstance();
        $instance->after([$this, 'validatePushConfig']);

        return $instance;
    }

    /**
     * @param Validator $validator
     * @throws ApiErrorCodeException
     * @throws \Modules\Base\Exception\FactoryInstanceErrorException
     */
    public function validatePushConfig(Validator $validator)
    {
        if ($validator->getMessageBag()->isEmpty()) {
            $configRequest = $this->get('topic_id', []);
            $service = ConfigValidatorFactory::make($this->getPushPath());
            $this->config = $service->validator($configRequest);
        }
    }

    /**
     * id
     * @return integer
     */
    public function getId()
    {
        return $this->get('id');
    }

    /**
     * 行動裝置
     * @return string
     */
    public function getMobileDevice()
    {
        return $this->get('mobile_device');
    }

    /**
     * 代碼
     * @return string
     */
    public function getCode()
    {
        return $this->get('code');
    }

    /**
     * 名稱
     * @return string
     */
    public function getName()
    {
        return $this->get('name');
    }

    /**
     * 類別
     * @return string
     */
    public function getCategory()
    {
        return $this->get('category');
    }

    /**
     * 跳轉開關
     * @return string
     */
    public function getRedirectSwitch()
    {
        return $this->get('redirect_switch');
    }

    /**
     * 跳轉網址
     * @return array|null
     */
    public function getRedirectUrl()
    {
        return $this->get('redirect_url') ?? null;
    }

    /**
     * 更新開關
     * @return string
     */
    public function getUpdateSwitch()
    {
        return $this->get('update_switch');
    }

    /**
     * 更新網址
     * @return string|null
     */
    public function getUpdateUrl()
    {
        return $this->get('update_url') ?? null;
    }

    /**
     * 更新文字
     * @return string|null
     */
    public function getUpdateContent()
    {
        return $this->get('update_content') ?? null;
    }

    /**
     * QQ id
     * @return string|null
     */
    public function getQQid()
    {
        return $this->get('qq_id') ?? null;
    }

    /**
     * wechat id
     * @return string|null
     */
    public function getWechatId()
    {
        return $this->get('wechat_id') ?? null;
    }

    /**
     * 線上客服
     * @return string|null
     */
    public function getCustomerService()
    {
        return $this->get('customer_service') ?? null;
    }

    /**
     * 狀態
     * @return string
     */
    public function getStatus()
    {
        return $this->get('status');
    }

    /**
     * 推播用的id
     * @return array
     */
    public function getTopicId()
    {
        return $this->config;
    }

    /**
     * 推播通道
     * @return string
     */
    public function getPushPath()
    {
        return $this->get('push_path');
    }

    /**
     * app版本
     * @return string
     */
    public function getAppVersion()
    {
        return $this->get('app_version') ?? null;
    }

    /**
     * app網址
     * @return string
     */
    public function getAppUrl()
    {
        return $this->get('app_url') ?? null;
    }
}
