<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/5/14
 * Time: 下午 05:08
 */

namespace Modules\AppAutomation\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\AppAutomation\Factory\Requests\Notify\RulesFactory;
use Modules\Base\Constants\ApiCode\AppAutomation90000\AppAutomationCodeConstants;
use Modules\Base\Http\Requests\HandleInvalidRequest;
use Modules\PushNotification\Constants\PushNotificationPlatformsConstants;

class AppAutomationAddRequest extends HandleInvalidRequest
{
    /**
     * @var array
     */
    private $config;

    /**
     * AppAutomationAddRequest constructor.
     * @param array $request
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Modules\Base\Exception\FactoryInstanceErrorException
     */
    protected function __construct(array $request)
    {
        parent::__construct($request);
        $notifyRules = RulesFactory::make($this->getNotify());
        $this->config = \Validator::make(
            $this->request['config'],
            $notifyRules->rules(),
            $notifyRules->messages()
        )->validate();
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->request['code'];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->request['name'];
    }

    /**
     * @return string
     */
    public function getPackageName(): string
    {
        return $this->request['package_name'];
    }

    /**
     * @return array
     */
    public function getPlatform(): array
    {
        return $this->request['platform'];
    }

    /**
     * @return string
     */
    public function getNotify(): string
    {
        return $this->request['notify'];
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * @return int
     */
    public function getUploadId(): int
    {
        return $this->request['upload_id'];
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'code'         => 'required|string',
            'name'         => 'required|string',
            'package_name' => 'required|string',
            'platform'     => 'required|array',
            'notify'       => 'required|' . Rule::in(PushNotificationPlatformsConstants::enum()),
            'config'       => 'required|array',
            'upload_id'    => 'required|integer'
        ];
    }

    /**
     * @inheritdoc
     */
    public function messages()
    {
        return [
            'code.required'         => AppAutomationCodeConstants::CODE_REQUIRED,
            'name.required'         => AppAutomationCodeConstants::NAME_REQUIRED,
            'package_name.required' => AppAutomationCodeConstants::PACKAGE_NAME_REQUIRED,
            'platform.required'     => AppAutomationCodeConstants::PLATFORM_REQUIRED,
            'notify.required'       => AppAutomationCodeConstants::NOTIFY_CHANNEL_REQUIRED,
            'upload_id.required'    => AppAutomationCodeConstants::UPLOAD_ID_REQUIRED,
            'upload_id.integer'     => AppAutomationCodeConstants::UPLOAD_ID_NOT_INTEGER
        ];
    }
}
