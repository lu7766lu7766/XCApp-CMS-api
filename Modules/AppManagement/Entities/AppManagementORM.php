<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/9/14
 * Time: 下午 01:38
 */

namespace Modules\AppManagement\Entities;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Modules\Account\Entities\Account;
use Modules\Base\Entities\BaseORM;
use Modules\PushNotification\Contract\IPushAble;

/**
 * @property string redirect_url
 * @property string name
 * @property DeviceORM[]|Collection deviceInfo
 * @property string push_path
 * @property array topic_id
 * @property int id
 */
class AppManagementORM extends BaseORM implements IPushAble
{
    use SoftDeletes;
    const ACCOUNT_INFO = 'accountInfo';
    protected $table = 'app_management';
    protected $casts = [
        'redirect_url' => 'array',
        'topic_id'     => 'array'
    ];
    protected $fillable = [
        'mobile_device',
        'code',
        'name',
        'category',
        'redirect_switch',
        'redirect_url',
        'update_switch',
        'update_url',
        'update_content',
        'qq_id',
        'wechat_id',
        'customer_service',
        'status',
        'topic_id',
        'account_id',
        'push_path',
        'app_version',
        'app_url',
    ];

    public function accountInfo()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    /**
     * @return HasMany
     */
    public function deviceInfo()
    {
        return $this->hasMany(DeviceORM::class, 'app_id');
    }

    /**
     * @return string
     */
    public function getPushPath()
    {
        return $this->push_path;
    }

    /**
     * 部署資訊
     * Get information of topic id
     * @return array
     */
    public function getDeployInfo()
    {
        return $this->topic_id;
    }

    /**
     * 主題
     * @return string
     */
    public function getTheme()
    {
        return $this->name;
    }

    /**
     * Get information of id
     * @return int
     */
    public function getId()
    {
        return $this->getKey();
    }
}
