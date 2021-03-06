<?php

namespace Modules\PushNotification\Http\Requests;

use Modules\Base\Constants\ApiCode\PushNotification40000\PushNotificationCodeConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class PushNotificationStoreRequest extends BaseFormRequest
{
    /**
     * @return string|null
     */
    public function getRequestContent()
    {
        return $this->get('content');
    }

    /**
     * @return array
     */
    public function getTopicIds()
    {
        return $this->get('topic_id', []);
    }

    /**
     * @return string|null
     */
    public function getScheduleDate()
    {
        return $this->get('schedule_date') ?? null;
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function rules()
    {
        return [
            'content'       => 'required|string',
            'topic_id'      => 'sometimes|required|array',
            'topic_id.*'    => 'sometimes|required|integer',
            'schedule_date' => 'sometimes|required|date_format:Y-m-d H:i:s|after:' . date('Y-m-d H:i:s')
        ];
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function messages()
    {
        return [
            'content.required'          => PushNotificationCodeConstants::CONTENT_REQUIRED,
            'content.string'            => PushNotificationCodeConstants::CONTENT_BE_STRING,
            'topic_id.array'            => PushNotificationCodeConstants::TOPIC_ID_ARRAY,
            'topic_id.*.integer'        => PushNotificationCodeConstants::TOPIC_ID_ARRAY_INTEGER,
            'schedule_date.date_format' => PushNotificationCodeConstants::SCHEDULE_DATE_FORMAT_ERROR,
            'schedule_date.after'       => PushNotificationCodeConstants::SCHEDULE_DATE_NOT_AFTER_NOW
        ];
    }
}
