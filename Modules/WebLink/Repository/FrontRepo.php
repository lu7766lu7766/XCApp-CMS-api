<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/11/26
 * Time: 下午 06:28
 */

namespace Modules\WebLink\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Modules\Base\Constants\CommonStatusConstants;
use Modules\Base\Util\LaravelLoggerUtil;
use Modules\WebLink\Entities\CategoryOrm;
use Modules\WebLink\Entities\WebLinkOrm;

class FrontRepo
{
    /**
     * 前台列表
     * @return Collection|CategoryOrm
     */
    public function categoryList()
    {
        $result = collect();
        try {
            $result = CategoryOrm::query()
                ->where('status', CommonStatusConstants::ENABLE)
                ->with('used')
                ->get();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param int $categoryId
     * @param int $appId
     * @param int $page
     * @param int $perpage
     * @return Collection|WebLinkOrm
     */
    public function webLinkList(int $categoryId, int $appId, int $page = 1, int $perpage = 20)
    {
        $result = collect();
        try {
            $result = WebLinkOrm::query()
                ->with('used')
                ->whereHas(WebLinkOrm::APP_MANAGEMENT, function (Builder $builder) use ($appId) {
                    $builder->where('app_management.id', $appId);
                })
                ->whereHas(WebLinkOrm::CATEGORY, function (Builder $builder) {
                    $builder->where('web_link_category.status', CommonStatusConstants::ENABLE);
                })
                ->where('category_id', $categoryId)
                ->where('status', CommonStatusConstants::ENABLE)
                ->forPage($page, $perpage)
                ->orderBy('id', 'DESC')
                ->get();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param int $categoryId
     * @param int $appId
     * @return int
     */
    public function total(int $categoryId, int $appId)
    {
        $result = 0;
        try {
            $result = WebLinkOrm::query()
                ->with('used')
                ->whereHas(WebLinkOrm::APP_MANAGEMENT, function (Builder $builder) use ($appId) {
                    $builder->where('app_management.id', $appId);
                })
                ->whereHas(WebLinkOrm::CATEGORY, function (Builder $builder) {
                    $builder->where('web_link_category.status', CommonStatusConstants::ENABLE);
                })
                ->where('category_id', $categoryId)
                ->where('status', CommonStatusConstants::ENABLE)
                ->count();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }
}
