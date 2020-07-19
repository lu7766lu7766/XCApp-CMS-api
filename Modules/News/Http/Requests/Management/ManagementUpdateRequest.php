<?php

namespace Modules\News\Http\Requests\Management;

use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Constants\ApiCode\News50000\NewsCodeConstants;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class ManagementUpdateRequest extends BaseFormRequest
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->get('id');
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->get('name', '');
    }

    /**
     * @return integer|null
     */
    public function getCategoryId()
    {
        return $this->get('category_id', null);
    }

    /**
     * @return int
     */
    public function getPublishTime()
    {
        return Carbon::parse($this->get('publish_time'))->timestamp;
    }

    /**
     * @return string
     */
    public function getPolling()
    {
        return $this->get('polling');
    }

    /**
     * @return string
     */
    public function getRequestContent()
    {
        return $this->get('content');
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->get('status');
    }

    /**
     * @return array
     */
    public function getTopic()
    {
        return $this->get('topic_id', []);
    }

    /**
     * @return int|null
     */
    public function getCoverImgId()
    {
        return $this->get('cover_image_id');
    }

    /**
     * @return array
     */
    public function getUploadId()
    {
        return $this->get('upload_id', []);
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function rules()
    {
        return [
            'id'             => 'required|integer',
            'name'           => 'required|string|max:255',
            'category_id'    => 'required|integer',
            'publish_time'   => 'required|date_format:"Y/m/d H:i:s"',
            'polling'        => 'required|' . Rule::in(NYEnumConstants::enum()),
            'content'        => 'required|string',
            'status'         => 'required|' . Rule::in(NYEnumConstants::enum()),
            'topic_id'       => 'sometimes|required|array',
            'topic_id.*'     => 'sometimes|required|integer',
            'cover_image_id' => 'sometimes|required|integer',
            'upload_id'      => 'sometimes|required|array|between:0,50',
            'upload_id.*'    => 'sometimes|required|integer'
        ];
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function messages()
    {
        return [
            'id.required'              => HttpAttributeInvalidCode::ID_REQUIRED,
            'id.integer'               => HttpAttributeInvalidCode::ID_BE_INTEGER,
            'name.string'              => NewsCodeConstants::NAME_BE_STRING,
            'name.required'            => NewsCodeConstants::NAME_REQUIRED,
            'name.max'                 => NewsCodeConstants::NAME_MAX,
            'category_id.required'     => NewsCodeConstants::CATEGORY_REQUIRED,
            'category_id.integer'      => NewsCodeConstants::CATEGORY_ID_BE_INTEGER,
            'publish_time.date_format' => NewsCodeConstants::PUBLISH_TIME_DATE_TYPE_WRONG,
            'publish_time.required'    => NewsCodeConstants::PUBLISH_TIME_REQUIRED,
            'polling.in'               => NewsCodeConstants::SELECTED_POLLING_IS_INVALID,
            'polling.required'         => NewsCodeConstants::SELECTED_POLLING_IS_INVALID,
            'content.required'         => NewsCodeConstants::CONTENT_REQUIRED,
            'content.string'           => NewsCodeConstants::CONTENT_BE_STRING,
            'status.required'          => NewsCodeConstants::STATUS_REQUIRED,
            'status.in'                => NewsCodeConstants::SELECTED_STATUS_IS_INVALID,
            'topic_id.array'           => NewsCodeConstants::TOPIC_BE_ARRAY,
            'topic_id.*'               => NewsCodeConstants::TOPIC_ID_BE_INTEGER,
            'cover_image_id.integer'   => NewsCodeConstants::COVER_IMAGE_ID_BE_INTEGER,
            'upload_id.between'        => NewsCodeConstants::UPLOAD_IDS_BETWEEN_MIN_MAX,
            'upload_id.array'          => NewsCodeConstants::UPLOAD_BE_ARRAY,
            'upload_id.*.integer'      => NewsCodeConstants::UPLOAD_ID_BE_INTEGER,
        ];
    }
}
