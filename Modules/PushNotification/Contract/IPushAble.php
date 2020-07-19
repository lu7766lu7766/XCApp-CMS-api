<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/3/19
 * Time: 下午 01:57
 */

namespace Modules\PushNotification\Contract;

interface IPushAble
{
    /**
     * Get information of push path
     * @return string
     */
    public function getPushPath();

    /**
     * 配置資訊
     * Get information of topic id
     * @return array
     */
    public function getDeployInfo();

    /**
     * Get information of id
     * @return int
     */
    public function getId();

    /**
     * 主題
     * @return string
     */
    public function getTheme();
}
