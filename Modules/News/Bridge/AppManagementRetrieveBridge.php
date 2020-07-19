<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/4
 * Time: 下午 01:15
 */

namespace Modules\News\Bridge;

use Illuminate\Support\Collection;
use Modules\AppManagement\Repository\AppManagementRepo;
use Modules\News\Contract\ITopic;

class AppManagementRetrieveBridge implements ITopic
{
    /**
     * @var AppManagementRepo
     */
    private $Rep;

    /**
     * AppManagementRetrieveBridge constructor.
     * @param AppManagementRepo $repo
     */
    public function __construct(AppManagementRepo $repo)
    {
        if (is_null($this->Rep = $repo)) {
            $this->Rep = \App::make(AppManagementRepo::class);
        }
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->Rep->getAllTopic();
    }
}
